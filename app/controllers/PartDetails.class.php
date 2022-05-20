<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;


class PartDetails {
        
    function __construct() {
        
       $this->userSesion = SessionUtils::loadObject('uzytkownik', true);
       $this->commentData = new \app\dataObjects\CommentData();
       
       if(is_null($this->userSesion)){
           $this->userSesion = new \app\dataObjects\SessionData();
           $this->userSesion->username = 'Gość';
           $this->userSesion->role = 'guest';
       }
       
       #koszyk w sesji
       $this->cart = SessionUtils::loadObject('koszyk', true);
       
       if(is_null($this->cart)){
           $this->cart = [];
       }
                
    }    
     
    public function action_showPartDetails() {
        
        $db = App::getDB();
        $partId = ParamUtils::getFromGet('partId');
        $partObj = $this->loadPartsById($partId);
        $comments = $this->loadComentsByPartId($partId);
        $this->reloadCaptcha();
        
        #adding to cart
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $part = ParamUtils::getFromPost("partId-input");
            $amount = ParamUtils::getFromPost("amount-input");


            $this->addItemToCart(['part'=>$part, 'amount'=>$amount]);
        }
            
        App::getSmarty()->assign("userSesion",$this->userSesion); 
        App::getSmarty()->assign("part",$partObj); 
        App::getSmarty()->assign("comentForm",$this->commentData); 
        App::getSmarty()->assign("comments",$comments); 
        App::getSmarty()->display("PartDetails.tpl");    

    }
    
    public function action_showPartDetailsComments(){
        
        #handle adding comment
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $this->commentData->email = ParamUtils::getFromPost("email",true,"Nie podano adresu e-mail");
            $this->commentData->nick = ParamUtils::getFromPost("nick",true,"Nie podano nicku");
            $this->commentData->captcha_resp = ParamUtils::getFromPost("captcha_resp",true,"Nie podano odpowiedzi na pytanie captcha");
            $this->commentData->comment_text = ParamUtils::getFromPost("comment_text",true,"Nie podano treści komentarza");
            $this->commentData->part_id = ParamUtils::getFromPost("part_id",true,"Nie znaleziono id części");
                    
            $captcha = $this->getCaptchaFromSession();
       
            if($this->validateCommentData($captcha['result'])){
                
                $this->addCommentToDatabase($this->commentData);
                
                $this->commentData->email = null;
                $this->commentData->nick = null;
                $this->commentData->comment_text = null;
            }
        }else{
            $this->commentData->part_id = ParamUtils::getFromGet('partId');
        }
        
        $this->reloadCaptcha();
        $comments = $this->loadComentsByPartId($this->commentData->part_id);

        App::getSmarty()->assign("comments",$comments); 
        App::getSmarty()->assign("comentForm",$this->commentData); 
        App::getSmarty()->display("PartComments.tpl"); 
    }
    
    #ładowania z bazy
    private function loadPartsById($partId){
        
        $db = App::getDB();
        if(!empty($partId)){
            $partObjs = $db->select('czesci', ["czesci.Id", "czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM"], ['Id'=>$partId]);   
        }
        
        return $partObjs[0];
    }
    
    private function loadComentsByPartId($partId){
        $db = App::getDB();

        if(!empty($partId)){
            $comments = $db->select('czesci_komentarze',
                ["[><]czesci" => ["Id_czesci" => "Id"]],
                ["czesci_komentarze.Id", "czesci_komentarze.Nick", "czesci_komentarze.E_mail", "czesci_komentarze.Tresc", "czesci_komentarze.Data_dodania"], 
                ['Id_czesci'=>$partId]); 
        }
        
        return $comments;
    }
    
    private function addCommentToDatabase($commentData){
        
        $db = App::getDB();
        
        trim($commentData->part_id);
        
        $db->insert('czesci_komentarze', ['Id'=>NULL, 
            'Id_czesci'=>$commentData->part_id, 
            'Nick'=>$commentData->nick, 
            "E_mail"=>$commentData->email,
            "Tresc"=>$commentData->comment_text]);
        
        App::getMessages()->addMessage(new Message("Komentarz został dodany!", Message::INFO));
    }
    
    #Obsługa koszyka
    private function addItemToCart($item){
         
        #check if registered user  
        if($this->userSesion->role=='guest'){
            App::getMessages()->addMessage(new Message("Zaloguj się aby móc dodać produkt do koszyka!", Message::ERROR));
            return;
        }
           
        #adding to cart
        if(empty($this->cart)){ 
            
            array_push($this->cart, $item);
            SessionUtils::storeObject('koszyk', $this->cart);
            
            App::getMessages()->addMessage(new Message("Produkt został dodany do koszyka!", Message::INFO)); 
            
        }else{
            
            $productExists = false;
            
            for($i=0; $i<sizeof($this->cart); $i++){
                
                if($this->cart[$i]['part']==$item['part']){
                    
                    $this->cart[$i]['amount']+=$item['amount'];
                    $productExists = true;
                    
                    SessionUtils::storeObject('koszyk', $this->cart);
                    App::getMessages()->addMessage(new Message("Liczba sztuk została zwiększona!", Message::INFO));
                }
 
            }
            
            if(!$productExists){
                
                array_push($this->cart, $item);
                
                SessionUtils::storeObject('koszyk', $this->cart);
                App::getMessages()->addMessage(new Message("Produkt został dodany do koszyka!", Message::INFO));
            }
            
        }
        
    }
    
    #walidacja komentarza + captcha
    private function validateCommentData($capthaResp) {
                
        if($capthaResp==$this->commentData->captcha_resp){
            if (strlen($this->commentData->nick)<3){
                Utils::addErrorMessage("Nick musi posiadać co najmniej 4 znaki.");
                return false;
            }else if(strlen($this->commentData->comment_text)<3){
                Utils::addErrorMessage("Tekst komentarza musi się składać z min. 10 znaków.");
                return false;
            }
        }else{
            Utils::addErrorMessage("Błąd weryfikacji captcha.");
            return false;
        }

        return true;   
    }
    
    #captcha
    private function addCaptchaToSession(){
        $captcha = $this->generateCaptcha();
        SessionUtils::storeObject('captcha', $captcha);
    }
    
    private function getCaptchaFromSession(){
        return SessionUtils::loadObject('captcha', true);
    }

    private function reloadCaptcha(){
       $this->addCaptchaToSession();
       $captcha = $this->getCaptchaFromSession();
       $this->commentData->captcha_question = $captcha['question'];
    }
   
    private function generateCaptcha(){
             
        $operationString = ['dodać', 'odjąc', 'razy', 'podzielić przez'];
        $numbersString = ['zero', 'jeden', 'dwa', 'trzy', 'cztery', 'pięć', 'sześć', 'siedem', 'osiem', 'dziewięć'];
        $operation = rand(0,3);
        $numberA=0;
        $numberB=0;
        $result=0;
        
        switch($operation){
            case 0:{
                do{
                   $numberA =  rand(0,9);
                   $numberB =  rand(0,9);
                   $result = $numberA+$numberB;
                }while ($result>10);
                break;
            }case 1:{
                 do{
                   $numberA =  rand(0,9);
                   $numberB =  rand(0,9);
                   $result = $numberA-$numberB;
                }while ($result<0);
                break;
            }case 2:{
                do{
                   $numberA =  rand(0,9);
                   $numberB =  rand(0,9);
                   $result = $numberA*$numberB;
                }while ($result>10);
                break;
            }case 3:{
                do{
                   $numberA =  rand(1,9);
                   $numberB =  rand(1,9);
                   $result = $numberA/$numberB;
                }while ($result>10 || ($numberA%$numberB)!=0);
                break;
            }
                
        }
        
       $captchaString = $numbersString[$numberA].' '.$operationString[$operation].' '.$numbersString[$numberB];
       $captcha = array('question'=>$captchaString, 'result'=>$result);
       
       return $captcha;
    }
          
}
