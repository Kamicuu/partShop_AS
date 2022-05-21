<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\ParamUtils;
use core\SessionUtils;


class StaticSitesCtrl{
    
    function __construct() {
                
       $this->userSesion = SessionUtils::loadObject('uzytkownik', true);
       
       if(is_null($this->userSesion)){
           $this->userSesion = new \app\dataObjects\SessionData();
           $this->userSesion->username = 'Gość';
           $this->userSesion->role = 'guest';
       }
                
    }    
    
    public function action_oNas() {

        App::getSmarty()->assign("userSesion",$this->userSesion);        
        App::getSmarty()->display("ONas.tpl");
        
    }
    
    public function action_kontakt() {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
            $this->fomData = new \stdClass();

            $this->fomData->temat = ParamUtils::getFromPost("topic",true,"Nie podano tematu wiadomości.");
            $this->fomData->wiadomosc = ParamUtils::getFromPost("description",true,"Nie podano treści wiadomości.");
            $this->fomData->email = ParamUtils::getFromPost("e-mail",true,"Nie podano adresu email.");
            $this->fomData->captchResp = ParamUtils::getFromPost("g-recaptcha-response",true,"Nie zaznaczono pola 'nie jestm robotem'");
            
            $this->sendMessage();
        }

        App::getSmarty()->assign("formData",$this->fomData); 
        App::getSmarty()->assign("userSesion",$this->userSesion);        
        App::getSmarty()->display("Kontakt.tpl");
        
    }
    
    private function sendMessage(){
        
        #recaptcha
        $reCaptcha = App::getReCaptcha();
        
        if(empty($this->fomData->temat) || empty($this->fomData->wiadomosc) || empty($this->fomData->email) || empty($this->fomData->captchResp)){
            return;
        }
            
        if(!$reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $this->formData->captchResp)){
            App::getMessages()->addMessage(new Message("Błąd weryfikacji captcha", Message::ERROR));
            return;
        }
        
        #mail headers
        $to= 'kontakt@partshop.pl';
        
        $email = $this->removeBadCharacters($this->fomData->email);
        $tresc = $this->removeBadCharacters($this->fomData->wiadomosc);
        $temat = $this->removeBadCharacters($this->fomData->temat);

        $subject = 'Wiadomość od ' . $email . " Temat: ". $temat;
        $message = 'Treść: '.$tresc;
        $headers  = "From: ".$email." <".$email.">\n";
        $headers .= "X-Sender: ".$email." <".$email."\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "X-Priority: 1\n"; // Urgent message!
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\n";       
                
        if(!filter_var($this->fomData->email, FILTER_VALIDATE_EMAIL)){
            App::getMessages()->addMessage(new Message("Błąd walidacji e-mail", Message::ERROR));
            return;
        }
        

        if(mail($to, $subject, $message, $headers)) {
            App::getMessages()->addMessage(new Message("Wiadomość wysłana!", Message::INFO));
        }else {
            App::getMessages()->addMessage(new Message("Wiadomość wysłana! (mail zwrocil false)", Message::INFO));
        }
   
        
    }
    
    private function removeBadCharacters($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    
}
