<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;


class LoginCtrl {
    
    function __construct() {
        
       $this->userSesion = SessionUtils::loadObject('uzytkownik', true);
       
       if(is_null($this->userSesion)){
           $this->userSesion = new \app\dataObjects\SessionData();
           $this->userSesion->username = 'Gość';
           $this->userSesion->role = 'guest';
       }
                
    }
    
    public function action_doLogin(){
        
        if($this->userSesion->role=='guest'){ 
            $login_data = new \stdClass();   

            $login_data->username = ParamUtils::getFromPost("username-input",true,"Nie podano loginu!");
            $login_data->password = ParamUtils::getFromPost("password-input",true,"Nie podano hasła!");

            if(!$this->validateUser($login_data)){
                App::getSmarty()->assign("userSesion",$this->userSesion);  
                App::getSmarty()->display("Login.tpl");
                return;
            }
   
        }
        
        App::getRouter()->redirectTo('main');
        
    }
    
    public function action_doLogout(){
        
        if($this->userSesion->role!='guest')
            SessionUtils::remove('uzytkownik');

        App::getRouter()->redirectTo('main');
    }

    
    public function action_loginViev() {
        
        if($this->userSesion->role=='guest'){    
            App::getSmarty()->assign("userSesion",$this->userSesion);  
            App::getSmarty()->display("Login.tpl");
        }else App::getRouter()->redirectTo('main');
        
    }
    
    private function validateUser($login_data){
        
        $db = App::getDB();
         
        $dbo_user = $db->select('uzytkownik', ['Login', 'Haslo', 'Rola'], ['Login'=>$login_data->username, 'Haslo'=>$login_data->password])[0];
        
        if(is_null($dbo_user)){
            App::getMessages()->addMessage(new Message("Dane logowania są nieprawidłowe!", Message::ERROR));
            return false;
        }
        
        $session_user = new \app\dataObjects\SessionData();
        $session_user->role = $dbo_user['Rola'];
        $session_user->username = $dbo_user['Login'];

        SessionUtils::storeObject('uzytkownik', $session_user);
        
        return true;
    }
    
}
