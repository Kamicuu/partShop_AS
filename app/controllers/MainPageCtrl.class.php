<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;


class MainPageCtrl {
    
    function __construct() {
        
       $this->user = SessionUtils::loadObject('uzytkownik');
       
       if(is_null($this->user)){
           $this->user = new \app\dataObjects\SessionData();
           $this->user->username = 'Gość';
           $this->user->role = 'guest';
       }
                
    }

    
    public function action_load() {
         
        App::getSmarty()->assign("user",$this->user);  
        App::getSmarty()->display("MainPage.tpl");
        
    }
    
}
