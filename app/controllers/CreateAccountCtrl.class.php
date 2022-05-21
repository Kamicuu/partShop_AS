<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;


class CreateAccountCtrl {
    
    function __construct() {
        
       $this->userSesion = SessionUtils::loadObject('uzytkownik', true);
       
       if(is_null($this->userSesion)){
           $this->userSesion = new \app\dataObjects\SessionData();
           $this->userSesion->username = 'Gość';
           $this->userSesion->role = 'guest';
       }else{
            App::getRouter()->redirectTo('main');
       }
                  
    }

    
    public function action_createAccount() {
         
        App::getSmarty()->assign("userSesion",$this->userSesion);  
        App::getSmarty()->display("RegisterPage.tpl");
        
    }
    
    public function action_registerNewUser() {
        
       $this->user = new \app\dataObjects\UserData();
       $this->client = new \app\dataObjects\ClientData();
       
       $this->client->email = ParamUtils::getFromPost("email-input",true,"Nie podano adresu e-mail");
       $this->client->imie = ParamUtils::getFromPost("imie-input",true,"Nie podano imienia");
       $this->client->nazwisko = ParamUtils::getFromPost("nazwisko-input",true,"Nie podano nazwiska");
       $this->client->kod_pocztowy = ParamUtils::getFromPost("kod_pocztowy-input",true,"Nie podano kodu pocztowego");
       $this->client->miasto = ParamUtils::getFromPost("miasto-input",true,"Nie podano miasta");
       $this->client->ulica = ParamUtils::getFromPost("ulica-input",true,"Nie podano ulicy");
       $this->client->numer_lokalu = ParamUtils::getFromPost("numer_lok-input",true,"Nie podano numeru lokalu");
       
          
       $this->user->login = ParamUtils::getFromPost("username-input",true,"Nie podano loginu");
       $this->user->haslo = ParamUtils::getFromPost("password-input",true,"Nie podano hasła");
       $this->user->haslo_conf = ParamUtils::getFromPost("password-input-conf",true,"Nie podano hasła");
       $this->user->rola = 'user';
       
       
       
       if($this->validateClient($this->client) && $this->validateUser($this->user)){
           
           try {
                
            $clientId = $this->addClientToDatabase($this->client);
            $this->user->id_klient = $clientId;
            $this->addUserToDatabase($this->user);
            
            App::getMessages()->addMessage(new Message("Konto zostało utworzone", Message::INFO));
            $this->user = null;
            $this->client = null;
            $this->returnViev();
               
           } catch (Exception $exc) {
                App::getMessages()->addMessage(new Message("Wystąpił nieznany błąd", Message::ERROR));
                $this->returnViev();
           }

          
       }else  $this->returnViev();
        
    }
    
     private function validateUser($data){
         
        $db = App::getDB();
         
        if(!is_null($db->select('uzytkownik', 'Login', ['Login'=>$data->login])[0])){
            App::getMessages()->addMessage(new Message("Użytkownik o podanym loginie już istnieje", Message::ERROR));
        }
        
        if(strlen($data->login)<4 || strlen($data->login)>45){
            App::getMessages()->addMessage(new Message("Długość loginu nieprawidłowa - dozwolone od 5 do 45 znaków", Message::ERROR));            
        }
        
        $number = preg_match('@[0-9]@', $data->haslo);
        $lowercase = preg_match('@[a-z]@', $data->haslo);
        $lenght = strlen($data->haslo);
        
        if(!$number || !$lowercase || $lenght<8 || $lenght>45){
            App::getMessages()->addMessage(new Message("Hasło nie spełnia wymogów bezpieczeństwa - a-z, 0-9, od 8 do 45 znaków", Message::ERROR));  
        }else if($data->haslo!=$data->haslo_conf){
            App::getMessages()->addMessage(new Message("Podane hasła nie są takie same!", Message::ERROR)); 
        }
        
        if(App::getMessages()->getNumberOfErrors()==0)
            return true;
        else return false;
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
    
    private function addUserToDatabase($data) {
        
        $db = App::getDB();
        
        $db->insert('uzytkownik', ['Id'=>NULL, 
            'Login'=>$data->login, 
            'Haslo'=>$data->haslo, 
            "Rola"=>$data->rola,
            "Id_klient"=>$data->id_klient]);
        
        
    }
    
    private function addClientToDatabase($data) {
        
        $db = App::getDB();
        
        $db->insert('klient', ['Id'=>NULL, 
            'Imie'=>$data->imie, 
            'Nazwisko'=>$data->nazwisko, 
            'E_mail'=>$data->email, 
            'Miasto'=>$data->miasto, 
            'Ulica'=>$data->ulica, 
            'Numer_lokalu'=>$data->numer_lokalu, 
            'Kod_pocztowy'=>$data->kod_pocztowy]);
        
        return $db->id();
           
    }
    
    
    private function returnViev(){
        
        App::getSmarty()->assign("clientForm",$this->client); 
        App::getSmarty()->assign("userForm",$this->user); 
        App::getSmarty()->assign("userSesion",$this->userSesion);  
        App::getSmarty()->display("RegisterPage.tpl");
        
    }
    
    
    
}
