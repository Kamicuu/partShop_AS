<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;


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
    
    $this->carSelection();       

  }
    
    // return true kiedy wszystkie parametry samochodu są wybrane
    private function carSelection(){
        
        $db = App::getDB();
        $selectedProducer = ParamUtils::getFromGet("producer-input");
        $selectedModel = ParamUtils::getFromGet('model-input');
        $this->selectedEngineVersionId = ParamUtils::getFromGet('engine-input');
        
        $producers = array_unique($db->select('model_pojazdu', 'Producent'));
        $categories = $db->select('czesci_kategoria', "*");
  
        
        if(!is_null($selectedProducer)){
            App::getSmarty()->assign("disableProducer",true ); 
            $models = array_unique($db->select('model_pojazdu', 'Model', ['Producent'=>$selectedProducer]));
        }

        if(!is_null($selectedModel)){
            App::getSmarty()->assign("disableModel",true ); 
            $engines = $db->select('model_pojazdu', ['Id','Silnik', 'Rok_produkcji'], ['Model'=>$selectedModel]);
            
            for($i=0; $i<sizeof($engines); $i++){
                $enginesWithYear[$i]['engine']=$engines[$i]['Rok_produkcji'].' / '.$engines[$i]['Silnik'];
                $enginesWithYear[$i]['id']=$engines[$i]['Id'];
            }
            
        }
        
        if(!is_null($this->selectedEngineVersionId)){            
            App::getSmarty()->assign("carSelectionComplete",true);
            App::getSmarty()->assign("disableEngine",true );
        }
         
        
        App::getSmarty()->assign("categories",$categories );
        App::getSmarty()->assign("producers",$producers ); 
        App::getSmarty()->assign("selectedProducer",$selectedProducer); 
        App::getSmarty()->assign("models",$models);
        App::getSmarty()->assign("selectedModel",$selectedModel); 
        App::getSmarty()->assign("engineVersions",$enginesWithYear ); 
        App::getSmarty()->assign("selectedEngineVersionId",$this->selectedEngineVersionId); 
        
        
        App::getSmarty()->assign("userSesion",$this->userSesion);  
        App::getSmarty()->display("MainPage.tpl");
        
    }
    
        
}
