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
        $filter = ParamUtils::getFromGet('search-input');
        
        if (!empty($carId) && !empty($categoryId)){
            $partObjs = $this->loadPartsByCategoryAndCar($categoryId, $carId, $filter);
            $categoryName = $db->select('czesci_kategoria', 'Nazwa', ['Id'=>$categoryId])[0];
            $carName = $db->select('model_pojazdu', ['Producent', 'Model', 'Silnik', 'Rok_produkcji'], ['Id'=>$carId])[0];
        }else if (!empty($categoryId)){
            $partObjs = $this->loadPartsByCategory($categoryId, $filter);
            $categoryName = $db->select('czesci_kategoria', 'Nazwa', ['Id'=>$categoryId])[0];
        }else if (!empty($carId)){
            $partObjs = $this->loadPartsByCar($carId, $filter);
            $carName = $db->select('model_pojazdu', ['Producent', 'Model', 'Silnik', 'Rok_produkcji'], ['Id'=>$carId])[0];
        }else $partObjs = $this->loadAllParts();
      
       
        
        App::getSmarty()->assign("categoryId",$categoryId);
        App::getSmarty()->assign("carId",$carId);
        App::getSmarty()->assign("filter",$filter);
        
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
    
    private function loadPartsByCategory($categoryId, $filter){
                
        $db = App::getDB();
        if(!empty($filter)){
            $partObjs = $db->select('czesci_kategoria', 
                ["[><]czesci" => ["Id" => "Id_kategoria"]], 
                ["czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM", "czesci_kategoria.Nazwa"], 
                ["czesci_kategoria.Id" => $categoryId, "OR" => ["czesci.Producent[~]" => $filter, "czesci.Model[~]" => $filter]]);   
        }else{
            $partObjs = $db->select('czesci_kategoria', 
                ["[><]czesci" => ["Id" => "Id_kategoria"]], 
                ["czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM", "czesci_kategoria.Nazwa"], 
                ["czesci_kategoria.Id" => $categoryId]);
        }
        
        return $partObjs;
    }
    
    private function loadPartsByCar($carId, $filter){
        
        $db = App::getDB();
        
        if(!empty($filter)){
            $partObjs = $db->select('czesci', 
                ["[><]czesci_kategoria" => ["Id_kategoria" => "Id"], 
                "[><]model_pojazdu" => ["Id_model_pojazdu" => "Id"] ], 
                ["czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM", "czesci_kategoria.Nazwa"], 
                ["model_pojazdu.Id"=>$carId]);
        }else{
            $partObjs = $db->select('czesci', 
                ["[><]czesci_kategoria" => ["Id_kategoria" => "Id"], 
                "[><]model_pojazdu" => ["Id_model_pojazdu" => "Id"] ], 
                ["czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM", "czesci_kategoria.Nazwa"], 
                ["model_pojazdu.Id"=>$carId, "OR" => ["czesci.Producent[~]" => $filter, "czesci.Model[~]" => $filter]]);
        }
        return $partObjs;
        
    }
    
    private function loadPartsByCategoryAndCar($categoryId, $carId, $filter){
        
        $db = App::getDB();
        if(!empty($filter)){
            $partObjs = $db->select('czesci', 
                ["[><]czesci_kategoria" => ["Id_kategoria" => "Id"], 
                "[><]model_pojazdu" => ["Id_model_pojazdu" => "Id"] ], 
                ["czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM", "czesci_kategoria.Nazwa"], 
                ["czesci_kategoria.Id" => $categoryId, "model_pojazdu.Id"=>$carId, "OR" => ["czesci.Producent[~]" => $filter, "czesci.Model[~]" => $filter]]);
        }
        else{ 
            $partObjs = $db->select('czesci', 
                ["[><]czesci_kategoria" => ["Id_kategoria" => "Id"], 
                "[><]model_pojazdu" => ["Id_model_pojazdu" => "Id"] ], 
                ["czesci.Producent", "czesci.Model", "czesci.Cena", "czesci.Jednostka_miary", "czesci.Opis", "czesci.Zamiennik", "czesci.URL_zdjecia", "czesci.Kod_OEM", "czesci_kategoria.Nazwa"], 
                ["czesci_kategoria.Id" => $categoryId, "model_pojazdu.Id"=>$carId]);
        }
        return $partObjs;
    }
        
}