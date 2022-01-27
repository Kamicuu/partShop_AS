<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;

class CartCtrl{
    
    function __construct() {
        
       $this->userSesion = SessionUtils::loadObject('uzytkownik', true);
       
       if(is_null($this->userSesion)){
           $this->userSesion = new \app\dataObjects\SessionData();
           $this->userSesion->username = 'Gość';
           $this->userSesion->role = 'guest';
       }
       
       #koszyk w sesji
       $this->cart = SessionUtils::loadObject('koszyk', true);
       
       if(is_null($this->cart)){
           App::getMessages()->addMessage(new Message("Twój koszyk jest pusty.", Message::WARNING));
       }       
                
    }    
    
    public function action_showCart() {
        
        #view
        $this->viewCart();
        
        #deleting
        $partId = ParamUtils::getFromPost("partId-input");
        
        if(!is_null($partId)){
            $this->removeFromCart($partId);
            $this->viewCart();
        }        

        App::getSmarty()->assign("userSesion",$this->userSesion);        
        App::getSmarty()->display("Cart.tpl");
        
    }
    
    public function action_createOrder(){
        
        $this->viewCart();
        
        $shippingCost = ParamUtils::getFromPost('kosztPrzesylki-input');
        $payment = ParamUtils::getFromPost('typPlatnosci-input');
        
        
        if(is_null($this->cart) || is_null($this->cart[0])){
           App::getMessages()->addMessage(new Message("Twój koszyk jest pusty - nie można wykonać zamówienia.", Message::ERROR));
           App::getSmarty()->display("Cart.tpl");
        }else $this->makeOrder ($shippingCost, $payment);
        
        App::getSmarty()->display("Cart.tpl");
        
    }
    
    private function viewCart(){
        
        $this->displayPartObjectArray = array();
        $this->sumOfProducts = 0;
        
        if(!is_null($this->cart)){
            
            for($i=0; $i<sizeof($this->cart); $i++){
                
                $displayPartObject;

                $displayPartObject = $this->getDetailsAboutProduct($this->cart[$i]['part']);
                $displayPartObject->ilosc = $this->cart[$i]['amount'];
                
                $this->sumOfProducts+=$displayPartObject->cena*$displayPartObject->ilosc;
                
                array_push($this->displayPartObjectArray, $displayPartObject);  
            }   
        }
        
        App::getSmarty()->assign("partObjArray",$this->displayPartObjectArray); 
        App::getSmarty()->assign("sumOfProducts",$this->sumOfProducts); 
        
    }


    private function getDetailsAboutProduct($productId){
        
        $partObj = new \app\dataObjects\PartsOrderData();
       
        $db = App::getDB();
        $part_dbo = $db->select('czesci', ['czesci.Id', 'czesci.Producent', 'czesci.Model', 'czesci.Cena', 'czesci.Jednostka_miary', 'czesci.URL_zdjecia'], ['Id'=>$productId])[0];
        
        $partObj->nazwa = $part_dbo['Producent'].' '.$part_dbo['Model'];
        $partObj->id = $part_dbo['Id'];
        $partObj->cena = $part_dbo['Cena'];
        $partObj->jednostka_miary = $part_dbo['Jednostka_miary'];
        $partObj->url_zdjecia = $part_dbo['URL_zdjecia'];

        return $partObj;
    }
        
    
    private function removeFromCart($productId){
        
        for($i=0; $i<sizeof($this->cart); $i++){

              if($this->cart[$i]['part']==$productId){
   
                  array_splice($this->cart, $i, 1);  

                  SessionUtils::storeObject('koszyk', $this->cart);
                  App::getMessages()->addMessage(new Message("Produkt został usunięty z koszyka.", Message::INFO));
              }
          }    
    }
    
    private function makeOrder($shippingCost, $payment) {
        
        $db = App::getDB();
        
        $clientId = $db->select('uzytkownik', 'Id_klient', ['Id'=>$this->userSesion->id])[0];
                
        $db->insert("zamowienie", [
        "Id_klient_zam" => $clientId,
	"Wartosc_zamowienia" => $this->sumOfProducts,
	"Koszt_przesylki" => $shippingCost,
	"Typ_platnosci" => $payment    
        ]);
        
        $orderId = $db->id();
            
        for($i=0; $i<sizeof($this->displayPartObjectArray); $i++){
 
            $db->insert("zamowienie_czesci", [
            "Id_zamowienie" => $orderId,
            "Id_czesci" => $this->displayPartObjectArray[$i]->id,
            "Ilosc_czesci" => $this->displayPartObjectArray[$i]->ilosc
            ]);
               
          }   
          
        SessionUtils::remove('koszyk');
        App::getMessages()->addMessage(new Message("Zamówienie zostało wysłane.", Message::INFO));
         
    }
    
}
