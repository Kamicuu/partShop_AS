<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\ParamUtils;

/**
 * Description of ClientListCtrl
 *
 * @author Kamil
 */
class ClientListCtrl {
    
    static $displayOnPage = 2;
    
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
           $this->cart = [];
       }          
    }   
    
    public function action_clientList(){
        
        $pageNum = ParamUtils::getFromGet('page-input');
        
        #calculate data for pagination
        if(!isset($pageNum)){
            $pageNum = 0;
        }
        
        #goto first page when clicked button search
        if($searchingByButton=="true"){
            $pageNum = 0;
        }
                        
        $this->offset = PartListCtrl::$displayOnPage*$pageNum;
        $this->limit = PartListCtrl::$displayOnPage;
                  
        App::getSmarty()->assign("userSesion",$this->userSesion); 
        App::getSmarty()->assign("clientData",$this->loadAllClients()); 
        App::getSmarty()->assign("pageNum",$pageNum);
        
        App::getSmarty()->display("ClientList.tpl");
    }
    
    public function action_showPartClientList(){
        
        #handle adding comment
        if($_SERVER['REQUEST_METHOD'] == 'POST'){    
            $pageNum = ParamUtils::getFromPost('page-input');
        }
        
        #calculate data for pagination
        if(!isset($pageNum)){
            $pageNum = 0;
        }
        
        $this->offset = PartListCtrl::$displayOnPage*$pageNum;
        $this->limit = PartListCtrl::$displayOnPage;
        
        App::getSmarty()->assign("userSesion",$this->userSesion); 
        App::getSmarty()->assign("clients",$this->loadAllClients()); 
        App::getSmarty()->assign("pageNum",$pageNum);
        
        App::getSmarty()->display("Client_list.tpl");
    }
    
    private function loadAllClients(){
        
        $db = App::getDB();
        
        $dbo_clients = $db->select('klient', ["Id", "Imie", "Nazwisko", "E_mail", "Miasto", "Ulica", "Numer_lokalu", "Kod_pocztowy"], ["LIMIT" =>[$this->offset, $this->limit]]);
        
        return $dbo_clients;
    }
}
