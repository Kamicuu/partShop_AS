<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;


class MainPageCtrl {
    
    function __construct() {
        
       $this->userSesion = SessionUtils::loadObject('uzytkownik', true);
       
       if(is_null($this->userSesion)){
           $this->userSesion = new \app\dataObjects\SessionData();
           $this->userSesion->username = 'Gość';
           $this->userSesion->role = 'guest';
       }
                
    }

    
    public function action_main() {
         
        App::getSmarty()->assign("userSesion",$this->userSesion);  
        App::getSmarty()->display("MainPage.tpl");
        
    }
    
}
