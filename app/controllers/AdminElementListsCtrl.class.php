<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;

class AdminElementListsCtrl{
    
    private $orderStatuses = ['w przygotowaniu', 'wysłane', 'anulowane'];
    
    function __construct() {
        
       $this->userSesion = SessionUtils::loadObject('uzytkownik', true);
       
       if(is_null($this->userSesion)){
           $this->userSesion = new \app\dataObjects\SessionData();
           $this->userSesion->username = 'Gość';
           $this->userSesion->role = 'guest';
       }
                
    }    
    
    public function action_showAllOrders() {
        
        $orderData = $this->loadAllOrders();
        
        App::getSmarty()->assign("userSesion",$this->userSesion);    
        App::getSmarty()->assign("orderData",$orderData);
        App::getSmarty()->assign("orderStatuses",$this->orderStatuses);  
        App::getSmarty()->display("AdminElementsLists.tpl");
        
        
    }
    
    public function action_changeOrderStatus(){
        
        #update status
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $orderId = ParamUtils::getFromPost("orderId");
            $status = ParamUtils::getFromPost("status");

            $this->changeOrderStatus($orderId, $status);
            $updatedOrder = $this->loadSingleOrderHeader($orderId);
            
            App::getSmarty()->assign("order", $updatedOrder);
            App::getSmarty()->assign("orderStatuses",$this->orderStatuses);  
            App::getSmarty()->display("Order_list_header_order.tpl");
        }
           
    }
    
    public function action_archivizeOrder(){
        
        #archivize order
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $orderId = ParamUtils::getFromPost("orderId");

            $this->archivizeOrder($orderId);
            
            $orderData = $this->loadAllOrders();
            
            App::getSmarty()->assign("orders",$orderData);
            App::getSmarty()->assign("orderStatuses",$this->orderStatuses);  
            App::getSmarty()->display("Order_list.tpl");
        }
        
    }
    
    private function changeOrderStatus($orderId, $orderStatus){
        
        $db = App::getDB();
        
        $db->update('zamowienie', ['Status'=>$orderStatus], ['Id' => $orderId]);
        
    }
    
    private function archivizeOrder($orderId){
        
        $db = App::getDB();
        
        $db->update('zamowienie', ['Do_archiwizacji'=>1], ['Id' => $orderId]);
    }
    
    private function loadSingleOrderHeader($orderId){
        $db = App::getDB();
         
        $updatedOrder = $db->select('zamowienie', 
               ["[><]klient" => ["Id_klient_zam" => "Id"]],
               ['zamowienie.Id', 'zamowienie.Data', 'zamowienie.Wartosc_zamowienia', 'zamowienie.Koszt_przesylki', 'zamowienie.Status', 'klient.Imie', 'klient.Nazwisko'],
               ['zamowienie.Id'=>$orderId])[0];
        
        $remapedOrder = new \stdClass();

        $remapedOrder->id = $updatedOrder['Id'];
        $remapedOrder->wartosc_zamowienia = $updatedOrder['Wartosc_zamowienia'];
        $remapedOrder->koszt_przesylki = $updatedOrder['Koszt_przesylki'];
        $remapedOrder->data = $updatedOrder['Data'];
        $remapedOrder->status = $updatedOrder['Status'];
        $remapedOrder->nazwa_zamawiajacego = $updatedOrder['Imie'].' '.$updatedOrder['Nazwisko'];
        
        return $remapedOrder;
    }
    
    private function loadAllOrders(){
        
        $db = App::getDB();
        
        $orderObjectArray;
         
        $dbo_orders = $db->select('zamowienie', 
                ["[><]klient" => ["Id_klient_zam" => "Id"]],
                ['zamowienie.Id', 'zamowienie.Data', 'zamowienie.Wartosc_zamowienia', 'zamowienie.Koszt_przesylki', 'zamowienie.Status', 'klient.Imie', 'klient.Nazwisko'],
                ['zamowienie.Do_archiwizacji'=>0]);
        
//        echo $db->debug()->select('zamowienie', 
//                ["[><]klient" => ["Id_klient_zam" => "Id"]],
//                ['zamowienie.Id', 'zamowienie.Data', 'zamowienie.Wartosc_zamowienia', 'zamowienie.Koszt_przesylki', 'zamowienie.Status', 'klient.Imie', 'klient.Nazwisko']);
        
        for($i=0; $i<sizeof($dbo_orders); $i++){
            
            $orderObj = new \app\dataObjects\OrderData();
            $partsOrderObjectArray = array();
                                    
            $orderObj->id = $dbo_orders[$i]['Id'];
            $orderObj->nazwa_zamawiajacego = $dbo_orders[$i]['Imie'].' '.$dbo_orders[$i]['Nazwisko'];
            $orderObj->data = $dbo_orders[$i]['Data'];
            $orderObj->wartosc_zamowienia = $dbo_orders[$i]['Wartosc_zamowienia'];
            $orderObj->koszt_przesylki = $dbo_orders[$i]['Koszt_przesylki'];
            $orderObj->status = $dbo_orders[$i]['Status'];
            
            $dbo_parts = $db->select('zamowienie', 
                ['[><]zamowienie_czesci' => ['Id' => 'Id_zamowienie'],
                 '[><]czesci'=>['zamowienie_czesci.Id_czesci'=>'Id']], 
                ['czesci.Id', 'czesci.Producent', 'czesci.Model', 'czesci.Cena', 'czesci.Jednostka_miary', 'zamowienie_czesci.Ilosc_czesci'],['zamowienie.Id'=>$orderObj->id]);
            
//            echo $db->debug()->select('zamowienie', 
//                ['[><]zamowienie_czesci' => ['Id' => 'Id_zamowienie'],
//                 '[><]czesci'=>['zamowienie_czesci.Id_czesci'=>'Id']], 
//                ['czesci.Id', 'czesci.Producent', 'czesci.Model', 'czesci.Cena', 'czesci.Jednostka_miary', 'zamowienie_czesci.Ilosc_czesci'],['zamowienie.Id'=>$orderObj->id]);
            
            for($j=0; $j<sizeof($dbo_parts); $j++){
                $partObj = new \app\dataObjects\PartsOrderData();
                
                $partObj->id = $dbo_parts[$j]['Id'];
                $partObj->cena = $dbo_parts[$j]['Cena'];
                $partObj->nazwa = $dbo_parts[$j]['Producent'].' '.$dbo_parts[$j]['Model'];
                $partObj->ilosc = $dbo_parts[$j]['Ilosc_czesci'];
                $partObj->jednostka_miary = $dbo_parts[$j]['Jednostka_miary']; 
                
                $partsOrderObjectArray[$j] = $partObj;
                  
            }
            
            $orderObj->czesci_zamowienia = $partsOrderObjectArray;
            $orderObjectArray[$i] = $orderObj;
           
        } 
        
        return $orderObjectArray;
    }
    
}
