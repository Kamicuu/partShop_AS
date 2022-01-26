<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\RoleUtils;
use core\ParamUtils;

class ProfileCtrl {
    
    function __construct() {
        
       $this->userSesion = SessionUtils::loadObject('uzytkownik', true);
       
       if(is_null($this->userSesion)){
           $this->userSesion = new \app\dataObjects\SessionData();
           $this->userSesion->username = 'Gość';
           $this->userSesion->role = 'guest';
       }
                
    }    
    
    public function action_editProfile() {
        
        #loading existing data
        $this->loadData();
                
        #update data
        
        $userObj = new \app\dataObjects\UserData();
        $clientObj = new \app\dataObjects\ClientData();

        if(!RoleUtils::inRole('admin') && ($_SERVER['REQUEST_METHOD'] == 'POST')){
            $clientObj->email = ParamUtils::getFromPost("email-input",true,"Nie podano adresu e-mail");
            $clientObj->imie = ParamUtils::getFromPost("imie-input",true,"Nie podano imienia");
            $clientObj->nazwisko = ParamUtils::getFromPost("nazwisko-input",true,"Nie podano nazwiska");
            $clientObj->kod_pocztowy = ParamUtils::getFromPost("kod_pocztowy-input",true,"Nie podano kodu pocztowego");
            $clientObj->miasto = ParamUtils::getFromPost("miasto-input",true,"Nie podano miasta");
            $clientObj->ulica = ParamUtils::getFromPost("ulica-input",true,"Nie podano ulicy");
            $clientObj->numer_lokalu = ParamUtils::getFromPost("numer_lok-input",true,"Nie podano numeru lokalu");
        }
        
        $userObj->haslo = ParamUtils::getFromPost("password-input");
   

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($this->clientId)){
                if(!empty($userObj->haslo)){
                    if($this->validateClient($clientObj) && $this->validateUser($userObj)){
                        $this->updateDatabaseClient($clientObj, $userObj);
                        $this->loadData();
                        App::getMessages()->addMessage(new Message("Dane klienta oraz hasło zostały zaktualizowane!", Message::INFO));
                    }
                }else if($this->validateClient($clientObj)){
                    $this->updateDatabaseClient($clientObj, null);
                    $this->loadData();
                    App::getMessages()->addMessage(new Message("Dane klienta zostały zaktualizowane!", Message::INFO));
                }
            }else{
                if(!empty($userObj->haslo)){
                    if($this->validateUser($userObj)){
                        $this->updateDatabaseUser($userObj);
                        App::getMessages()->addMessage(new Message("Hasło zostało zaktualizowane!", Message::INFO));
                    }
                }
            }
        }

        
        App::getSmarty()->assign("userSesion",$this->userSesion);        
        App::getSmarty()->display("ProfileDetails.tpl");
        
    }
    
    public function action_deleteProfile(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $profileId = ParamUtils::getFromPost("id-input",true,"Nie podano id konta do usunięcia!");
            $ackDelete = ParamUtils::getFromPost("ack-input");
            
            #viev only
            if(empty($ackDelete)){
                App::getSmarty()->assign("userName",$this->userSesion->username); 
                App::getSmarty()->assign("userId",$profileId);
                App::getSmarty()->assign("userSesion",$this->userSesion);  
                App::getSmarty()->display("DeleteProfile.tpl");
            }else if($ackDelete=="true") {
                
                if($this->userSesion->id != $profileId){
                    App::getMessages()->addMessage(new Message("Podany profileId nie zgadza się z Id w sesji!", Message::ERROR));
                }
                
                if(RoleUtils::inRole('admin')){
                    App::getMessages()->addMessage(new Message("Usunięcie konta admina jest niemożliwe z poziomu aplikacji!", Message::ERROR));
                }

                if(App::getMessages()->getNumberOfErrors()==0){
                    $this->deleteDatabaseUser($profileId);
                    App::getRouter()->redirectTo('doLogout');
                }else{
                    App::getSmarty()->assign("userName",$this->userSesion->username); 
                    App::getSmarty()->display("DeleteProfile.tpl");
                }
                
            }else App::getRouter()->redirectTo('editProfile');
            
        }else App::getRouter()->redirectTo('main');
        
    }
    
    private function deleteDatabaseUser($userId){
        
        $db = App::getDB();
        $db->delete('uzytkownik', ['Id'=>$userId]);
        
    }
    
    private function updateDatabaseClient($clientObj, $userObj){
        
        $db = App::getDB();
        $db->update('klient', 
                ['Imie'=>$clientObj->imie,
                 'Nazwisko'=>$clientObj->nazwisko,
                 'E_mail'=>$clientObj->email,
                 'Miasto'=>$clientObj->miasto,
                 'Ulica'=>$clientObj->ulica,
                 'Numer_lokalu'=>$clientObj->numer_lokalu,
                 'Kod_pocztowy'=>$clientObj->kod_pocztowy
                ], ['Id'=>$this->client['Id']]);
        
        if(!is_null($userObj)){
            $db->update('uzytkownik', ['Haslo'=>$userObj->haslo], ['Id'=>$this->user['Id']]);
        }
        
    }
    
    private function updateDatabaseUser($userObj){
        
        $db = App::getDB();
        $db->update('uzytkownik', ['Haslo'=>$userObj->haslo], ['Id'=>$this->user['Id']]);
        
    }
    
    private function loadData() {
                
        $this->user = $this->loadUseData($this->userSesion->username);
        $this->clientId = $this->user['Id_klient'];
        
        if(!empty($this->clientId)){
            $this->client = $this->loadClientData($this->clientId);
        }
        
        App::getSmarty()->assign("clientData",$this->client);
        App::getSmarty()->assign("userData",$this->user);
        
    }
    
    private function loadUseData($userName){
        
        $db = App::getDB();
        $userData = $db->select('uzytkownik', ['Id', 'Login', 'Rola', 'Id_klient'], ['Login'=>$userName])[0];
        
        return $userData;
    }
    
    private function loadClientData($clientId){
        
        $db = App::getDB();
        $clientData = $db->select('uzytkownik', 
                ["[><]klient" => ["Id_klient" => "Id"]], 
                ['klient.Id','klient.Imie','klient.Nazwisko','klient.E_mail', 'klient.Miasto', 'klient.Ulica', 'klient.Numer_lokalu', 'klient.Kod_pocztowy'], 
                ["uzytkownik.Id_klient" => $clientId])[0];
         
        return $clientData;
    }
    
     private function validateClient($data){
        
        if(strlen($data->email)<4 || strlen($data->email)>45){
            App::getMessages()->addMessage(new Message("Długość e-maila nieprawidłowa - dozwolone od 5 do 45 znaków", Message::ERROR));            
        }
        
        $exp = preg_match('/^[a-zĄĆĘŁÓŚŻŹąćęłóśżź ]+$/iu', $data->imie);
        
        if(strlen($data->imie)>45 || !$exp){
            App::getMessages()->addMessage(new Message("Format imienia nieprawidłowy - dozwolone do 45 znaków - tylko litery", Message::ERROR));            
        }
        
        $exp = preg_match('/^[a-zĄĆĘŁÓŚŻŹąćęłóśżź ]+$/iu', $data->nazwisko);
        
        if(strlen($data->nazwisko)>45 || !$exp){
            App::getMessages()->addMessage(new Message("Format nazwiska nieprawidłowy - dozwolone do 45 znaków - tylko litery", Message::ERROR));            
        }
        
        $uppercase = preg_match('@[A-Z]@', $data->kod_pocztowy);
        $lowercase = preg_match('@[a-z]@', $data->kod_pocztowy);
        $specialChars = preg_match('@[^\w]@', $data->kod_pocztowy);
  
        if(strlen($data->kod_pocztowy)>10 || strlen($data->kod_pocztowy)<5  || $uppercase || $lowercase || $specialChars){
            App::getMessages()->addMessage(new Message("Format kodu pocztowego nieprawidłowy - dozwolone od 5 do 10 cyfr (bez myślnika)", Message::ERROR));            
        }
        
        $exp = preg_match('/^[a-zĄĆĘŁÓŚŻŹąćęłóśżź ]+$/iu', $data->miasto);
        
        if(strlen($data->miasto)>45 || !$exp){
            App::getMessages()->addMessage(new Message("Format miasta nieprawidłowy - dozwolone do 45 znaków - tylko litery", Message::ERROR));            
        }
        
        $exp = preg_match('/^[a-zĄĆĘŁÓŚŻŹąćęłóśżź ]+$/iu', $data->ulica);
        
        if(strlen($data->ulica)>45 || !$exp){
            App::getMessages()->addMessage(new Message("Format ulicy nieprawidłowy - dozwolone do 45 znaków - tylko litery", Message::ERROR));            
        }
        
  
        if(strlen($data->numer_lokalu)>10){
            App::getMessages()->addMessage(new Message("Format numeru lokalu nieprawidłowy - dozwolone do 10 znaków", Message::ERROR));            
        }
        
        if(App::getMessages()->getNumberOfErrors()==0)
            return true;
        else false;
        
    }
    
    private function validateUser($data){
                         
        $number = preg_match('@[0-9]@', $data->haslo);
        $lowercase = preg_match('@[a-z]@', $data->haslo);
        $lenght = strlen($data->haslo);
        
        if(!$number || !$lowercase || $lenght<8 || $lenght>45){
            App::getMessages()->addMessage(new Message("Hasło nie spełnia wymogów bezpieczeństwa - a-z, 0-9, od 8 do 45 znaków", Message::ERROR));  
        }
        
        if(App::getMessages()->getNumberOfErrors()==0)
            return true;
        else return false;
    }
    
    
}
