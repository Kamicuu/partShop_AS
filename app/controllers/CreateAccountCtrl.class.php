<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;


class CreateAccountCtrl {
    
    function __construct() {

        $this->user = new \app\dataObjects\SessionData();
        $this->user->username = 'Gość';
        $this->user->role = 'guest';
          
    }

    
    public function action_createAccount() {
         
        App::getSmarty()->assign("user",$this->user);  
        App::getSmarty()->display("RegisterPage.tpl");
        
    }
    
    public function action_registerNewUser() {
        
       $user = new \app\dataObjects\UserData();
       $client = new \app\dataObjects\ClientData();
       
       $client->email = ParamUtils::getFromPost("email-input",true,"Nie podano adresu e-mail");
       $client->imie = ParamUtils::getFromPost("imie-input",true,"Nie podano imienia");
       $client->nazwisko = ParamUtils::getFromPost("nazwisko-input",true,"Nie podano nazwiska");
       $client->kod_pocztowy = ParamUtils::getFromPost("kod_pocztowy-input",true,"Nie podano kodu pocztowego");
       $client->miasto = ParamUtils::getFromPost("miasto-input",true,"Nie podano miasta");
       $client->ulica =  ParamUtils::getFromPost("ulica-input",true,"Nie podano ulicy");
       $client->numer_lokalu =  ParamUtils::getFromPost("numer_lok-input",true,"Nie podano numeru lokalu");
       
       App::getMessages()->addMessage(new Message("Dupachuj", Message::INFO));
       
       $this->test();
       
//       $clientId = $this->addClientToDatabase($client);
//         
//       $user->login = ParamUtils::getFromPost("username-input",true,"Nie podano loginu");
//       $user->haslo = ParamUtils::getFromPost("password-input",true,"Nie podano hasła");
//       $user->rola = 'user';
//       $user->id_klient = $clientId;
//       
//       $this->addUserToDatabase($user);
       
    }
    
//    private function addUserToDatabase($data) {
//        
//        $db = App::getDB();
//        
//        $db->insert('uzytkownik', ['Id'=>NULL, 
//            'Login'=>$data->login, 
//            'Haslo'=>$data->haslo, 
//            "Rola"=>$data->rola,
//            "Id_klient"=>$data->id_klient]);
//        
//        
//    }
//    
//    private function addClientToDatabase($data) {
//        
//        $db = App::getDB();
//        
//        $db->insert('klient', ['Id'=>NULL, 
//            'Imie'=>$data->imie, 
//            'Nazwisko'=>$data->nazwisko, 
//            'E-mail'=>$data->email, 
//            'Miasto'=>$data->miasto, 
//            'Ulica'=>$data->ulica, 
//            'Numer_lokalu'=>$data->numer_lokalu, 
//            'Kod_pocztowy'=>$data->kod_pocztowy]);
//        
//        return $db->id();
//           
//    }
    
    private function test(){
        
        App::getSmarty()->display("RegisterPage.tpl");
        
    }
    
}
