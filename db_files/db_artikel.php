<?php

require_once 'db_init.php';

class dbArtikli{
    
     public static function dodajArtikel($ime, $cena, $opis, $zaloga){
         $db = dbINIT::getInstance();
         
         $statement = $db->prepare("INSERT INTO Artikel (imeArtikla, cenaArtikla, opisArtikla, zalogaArtikla) VALUES(:ime, :cena, :opis, :zaloga)");
         $statement->bindParam(":ime", $ime);
         $statement->bindParam(":cena", $cena);
         $statement->bindParam(":opis", $opis);
         $statement->bindParam(":zaloga", $zaloga);
         $statement->execute();
     }
    
}