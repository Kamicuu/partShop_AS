<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;
use \Medoo\Medoo;

class PartListCtrl {
    
    function __construct() {
        
       $this->userSesion = SessionUtils::loadObject('uzytkownik', true);
       
       if(is_null($this->userSesion)){
           $this->userSesion = new \app\dataObjects\SessionData();
           $this->userSesion->username = 'Gość';
           $this->userSesion->role = 'guest';
       }
                
    }    
     
    public function action_partList(){
        
        $db = App::getDB();
        $carId = ParamUtils::getFromGet('carId-input');
        $categoryId = ParamUtils::getFromGet('categoryId-input');
        
        if (!is_null($carId) && !is_null($categoryId)){
            $partObjs = $this->loadPartsByCategoryAndCar($categoryId, $carId);
            $categoryName = $db->select('czesci_kategoria', 'Nazwa', ['Id'=>$categoryId])[0];
            $carName = $db->select('model_pojazdu', ['Producent', 'Model', 'Silnik', 'Rok_produkcji'], ['Id'=>$carId])[0];
        }else if (!is_null($categoryId)){
            $partObjs = $this->loadPartsByCategory($categoryId);
            $categoryName = $db->select('czesci_kategoria', 'Nazwa', ['Id'=>$categoryId])[0];
        }else if (!is_null($carId)){
            $carName = $db->select('model_pojazdu', ['Producent', 'Model', 'Silnik', 'Rok_produkcji'], ['Id'=>$carId])[0];
        }else $partObjs = $this->loadAllParts();
      
        
        App::getSmarty()->assign("categoryName",$categoryName);
        App::getSmarty()->assign("carName",$carName);
        App::getSmarty()->assign("userSesion",$this->userSesion); 
        App::getSmarty()->assign("partObjects",$partObjs); 
        App::getSmarty()->display("PartList.tpl");
        
    }
    
    private function loadAllParts(){
        
        $db = App::getDB();
        $partObjs = $db->select('czesci', ["[><]czesci_kategoria" => ["Id_kategoria" => "Id"]], 
                ["czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM", "czesci_kategoria.Nazwa"]);
        
        return $partObjs;
    }
    
    private function loadPartsByCategory($categoryId){
                
        $db = App::getDB();
        $partObjs = $db->select('czesci_kategoria', 
                ["[><]czesci" => ["Id" => "Id_kategoria"]], 
                ["czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM", "czesci_kategoria.Nazwa"], 
                ["czesci_kategoria.Id" => $categoryId]);
        
        return $partObjs;
    }
    
    private function loadPartsByCategoryAndCar($categoryId, $carId){
        
        $db = App::getDB();
        $partObjs = $db->select('czesci', 
                ["[><]czesci_kategoria" => ["Id_kategoria" => "Id"], 
                "[><]model_pojazdu" => ["Id_model_pojazdu" => "Id"] ], 
                ["czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM", "czesci_kategoria.Nazwa"], 
                ["czesci_kategoria.Id" => $categoryId, "model_pojazdu.Id"=>$carId]);
   
        return $partObjs;
    }
        
}
