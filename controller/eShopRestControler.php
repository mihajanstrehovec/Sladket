<?php
require_once("model/eshopDB.php");
require_once("view/restViewHelper.php");
class eShopRestControler {
    
    public static function index() {
            
        echo restViewHelper::renderJSON(eshopDB::getAll());
    
    }

    public static function getArt($id){
        
        $input ["idArtikla"] = $id;
        echo restViewHelper::renderJSON(eshopDB::get($input));
        
    }
}