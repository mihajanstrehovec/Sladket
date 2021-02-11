<?php

// Kot db Artikel -> uzame form inpute in z njimi dela ukaze na db

require_once 'model/AbstractDB.php';

class eshopDB extends AbstractDB {

    public static function insert(array $params) {
        return parent::modify("INSERT INTO Artikel (imeArtikla, cenaArtikla, opisArtikla, kategorijaArtikla, zalogaArtikla) "
                        . " VALUES (:imeArtikla, :cenaArtikla, :opisArtikla, :kategorijaArtikla, :zalogaArtikla)", $params);
    }

    public static function addImage(array $params) {
        return parent::modify("INSERT INTO Images (idArtikla, imeSlike) "
                        . " VALUES (:idArtikla, :imeSlike)", $params);
    }

    public static function insertImage(array $params) {
        return parent::modify("INSERT INTO Images (idArtikla, imeSlike) "
                        . " VALUES (:idArtikla, :imeSlike)", $params);
    }

    public static function getImages(array $idArtikla) {
        
        $Slike = parent::query("SELECT imeSlike"
                        . " FROM Images"
                        . " WHERE idArtikla = :idArtikla", $idArtikla);
      
        return($Slike);
    }

    public static function izbrisiSliko(array $imeSlike) {
        return parent::modify("DELETE FROM Images"
                        . " WHERE imeSlike = :imeSlike", $imeSlike); 
    }




    public static function insertNarocilo(array $params) {
        return parent::modify("INSERT INTO Naročilo (idStranke, total, potrjeno) "
                        . " VALUES (:idStranke, :total, :potrjeno)", $params);
    }

    public static function insertNarociloArtikel(array $params) {
        return parent::modify("INSERT INTO Narocilo_artikli (idArtiklaForeign, idNarocilaForeign, kolicina) "
                        . " VALUES (:idArtiklaForeign, :idNarocilaForeign, :kolicina)", $params);
    }

    public static function getNarocila(array $idStranke) {
        
        $Narocila = parent::query("SELECT idNaročila, total, potrjeno, preklicano, stornirano"
                        . " FROM Naročilo"
                        . " WHERE idStranke = :idStranke", $idStranke);
        
        return($Narocila);
    }

    public static function getNarocilaAll() {
        
        $Narocila = parent::query("SELECT idNaročila, total, potrjeno, preklicano, stornirano"
                        . " FROM Naročilo"
                        . " ORDER BY idNaročila DESC");
        
        return($Narocila);
    }

    public static function potrdiNarocilo(array $params) {
        return parent::modify("UPDATE Naročilo SET potrjeno = 1"
                        . " WHERE idNaročila = :idNarocila", $params); 
    }

    public static function prekliciNarocilo(array $params) {
        return parent::modify("UPDATE Naročilo SET preklicano = 1"
                        . " WHERE idNaročila = :idNarocila", $params); 
    }

    public static function stornirajNarocilo(array $params) {
        return parent::modify("UPDATE Naročilo SET stornirano = 1"
                        . " WHERE idNaročila = :idNarocila", $params); 
    }

    public static function getNarociloArtikli(array $idNarocila) {
        
        $Narocila = parent::query("SELECT idArtiklaForeign, kolicina"
                        . " FROM Narocilo_artikli"
                        . " WHERE idNarocilaForeign = :idNarocila", $idNarocila);
        
        return($Narocila);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE Artikel SET imeArtikla = :imeArtikla, cenaArtikla = :cenaArtikla, "
                        . "opisArtikla = :opisArtikla, zalogaArtikla = :zalogaArtikla, kategorijaArtikla = :kategorijaArtikla"
                        . " WHERE idArtikla = :idArtikla", $params); 
    }

    

    public static function delete(array $params) {
        return parent::modify("UPDATE Artikel SET aktiviran = 0"
                        . " WHERE idArtikla = :idArtikla", $params); 
    }

    public static function aktiviraj(array $params) {
        return parent::modify("UPDATE Artikel SET aktiviran = 1"
                        . " WHERE idArtikla = :idArtikla", $params); 
    }

    public static function get(array $id) {
        $books = parent::query("SELECT idArtikla, imeArtikla, cenaArtikla, opisArtikla, zalogaArtikla, kategorijaArtikla, aktiviran,ocena,steviloOcen"
                        . " FROM Artikel"
                        . " WHERE idArtikla = :idArtikla", $id);
        
        if (count($books) == 1) {
            return $books[0];
        } else {
            throw new InvalidArgumentException("No such book");
        }
    }
    

    public static function getArtikelCompressed(array $id) {
        $books = parent::query("SELECT imeArtikla, cenaArtikla"
                        . " FROM Artikel"
                        . " WHERE idArtikla = :idArtikla", $id);
        
        if (count($books) == 1) {
            return $books[0];
        } else {
            throw new InvalidArgumentException("No such book");
        }
    }

    public static function getStranka(array $mailStranke) {
        
        $Stranka = parent::query("SELECT gesloStranke, aktivirana"
                        . " FROM Stranka"
                        . " WHERE mailStranke = :mailStranke", $mailStranke);
        
        return($Stranka);
    }

    public static function getStrankaNaslov(array $mailStranke) {
        return parent::query("SELECT ulica, hisnaSt, posta, postnaSt"
                        . " FROM Stranka"
                        . "  WHERE mailStranke = :mailStranke", $mailStranke);
    }


    public static function getStrankaID(array $mailStranke) {
        
        $Stranka = parent::query("SELECT idStranke"
                        . " FROM Stranka"
                        . " WHERE mailStranke = :mailStranke", $mailStranke);
        
        return($Stranka);
    }

    public static function getStrankaMail(array $idStranke) {
        
        $Stranka = parent::query("SELECT mailStranke"
                        . " FROM Stranka"
                        . " WHERE idStranke = :idStranke", $idStranke);
        
        return($Stranka);
    }




    public static function getAll() {
        return parent::query("SELECT idArtikla, imeArtikla, cenaArtikla, opisArtikla, kategorijaArtikla, zalogaArtikla, aktiviran"
                        . " FROM Artikel"
                        . " ORDER BY idArtikla DESC");
    }

    public static function getKategorija(array $kategorijaArtikla) {
        return parent::query("SELECT idArtikla, imeArtikla, cenaArtikla, opisArtikla, kategorijaArtikla, zalogaArtikla"
                        . " FROM Artikel"
                        . " WHERE kategorijaArtikla = :kategorijaArtikla", $kategorijaArtikla
                        . " ORDER BY idArtikla DESC");
    }

    public static function ustvariStranko(array $params) {
        return parent::modify("INSERT INTO Stranka (imeStranke, priimekStranke, mailStranke, gesloStranke, ulica, posta, postnaSt, hisnaSt) "
                        . " VALUES (:imeStranke, :priimekStranke, :mailStranke, :gesloStranke, :ulica, :posta, :postnaSt, :hisnaSt)", $params);
    }

    public static function urejanjeGesla(array $params) {
        return parent::modify("UPDATE Stranka SET gesloStranke = :gesloStranke"
                        . " WHERE mailStranke = :mailStranke", $params); 
    }

    public static function urediNaslov(array $params) {
        return parent::modify("UPDATE Stranka SET ulica = :ulica, hisnaSt = :hisnaSt, postnaSt = :postnaSt, posta = :posta"
                        . " WHERE mailStranke = :mailStranke", $params); 
    }

    public static function spremeniNaslovStranke(array $params) {
        return parent::modify("UPDATE Stranka SET ulica = :ulica, hisnaSt = :hisnaSt, postnaSt = :postnaSt, posta = :posta"
                        . " WHERE idStranke = :idStranke", $params); 
    }

    public static function urejanjeGeslaProdajalec(array $params) {
        return parent::modify("UPDATE Prodajalec SET geslo = :geslo"
                        . " WHERE uporabniskoIme = :uporabniskoIme", $params); 
    }

    public static function urejanjeUporabniskegaImena(array $params) {
        return parent::modify("UPDATE Prodajalec SET uporabniskoIme = :novoUporabniskoIme"
                        . " WHERE uporabniskoIme = :uporabniskoIme", $params); 
    }

    public static function urejanjeMaila(array $params) {
        return parent::modify("UPDATE Stranka SET mailStranke = :noviMailStranke"
                        . " WHERE mailStranke = :mailStranke", $params); 
    }


    public static function getProdajalec(array $uporabniskoIme) {
        
        $Stranka = parent::query("SELECT geslo, aktiviran"
                        . " FROM Prodajalec"
                        . " WHERE uporabniskoIme = :uporabniskoIme", $uporabniskoIme);
        
        return($Stranka);
    }

    public static function getStranke() {
        return parent::query("SELECT idStranke, imeStranke, priimekStranke, aktivirana, ulica, hisnaSt, posta, postnaSt"
                        . " FROM Stranka"
                        . " ORDER BY idStranke DESC");
    }

    public static function deaktivirajStranko(array $params) {
        return parent::modify("UPDATE Stranka SET aktivirana = 0"
                        . " WHERE idStranke = :idStranke", $params); 
    }

    public static function aktivirajStranko(array $params) {
        return parent::modify("UPDATE Stranka SET aktivirana = 1"
                        . " WHERE idStranke = :idStranke", $params); 
    }


    // ADMIN SHIT

    public static function getProdajalci() {
        return parent::query("SELECT idProdajalca, uporabniskoIme, eMail, aktiviran"
                            . " FROM Prodajalec"
                            . " ORDER BY idProdajalca DESC");
    }

    public static function deaktivirajProdajalca(array $params) {
        return parent::modify("UPDATE Prodajalec SET aktiviran = 0"
                        . " WHERE idProdajalca = :idProdajalca", $params); 
    }

    public static function aktivirajProdajalca(array $params) {
        return parent::modify("UPDATE Prodajalec SET aktiviran = 1"
                        . " WHERE idProdajalca = :idProdajalca", $params); 
    }

    public static function urejanjeUporabniskegaImenaP(array $params) {
        return parent::modify("UPDATE Prodajalec SET uporabniskoIme = :ime"
                        . " WHERE idProdajalca = :id", $params); 
    }

    public static function getProdajalecByID(array $id) {
        
        $Stranka = parent::query("SELECT geslo"
                        . " FROM Prodajalec"
                        . " WHERE idProdajalca = :idProdajalca", $id);
        
        return($Stranka);
    }

    public static function urejanjeGeslaProdajalecID(array $params) {
        return parent::modify("UPDATE Prodajalec SET geslo = :geslo"
                        . " WHERE idProdajalca = :idProdajalca", $params); 
    }

    public static function getAdmin(array $mailStranke) {
        
        $Stranka = parent::query("SELECT geslo"
                        . " FROM Administrator"
                        . " WHERE eMail = :eMail", $mailStranke);
        
        return($Stranka);
    }

    public static function getAdminID() {
        
        $Stranka = parent::query("SELECT geslo"
                        . " FROM Administrator"
                        . " WHERE idAdmin = 2");
        
        return($Stranka);
    }


    public static function urejanjeGeslaAdmin(array $input) {
        
        $Stranka = parent::modify("UPDATE Administrator SET geslo = :geslo"
                        . " WHERE idAdmin = 2", $input);
        
        return($Stranka);
    }

    public static function ustvariProdajalca(array $params) {
        return parent::modify("INSERT INTO Prodajalec (imeProdajalca, priimekProdajalca, eMail, geslo, uporabniskoIme) "
                        . " VALUES (:imeProdajalca, :priimekProdajalca, :eMail, :geslo, :uporabniskoIme)", $params);
    }

    public static function zabeležiOceno(array $params) {
        return parent::modify("INSERT INTO ArtikelStrankaOcena (idArtikla, idStranke) "
                        . " VALUES (:idArtikla, :idStranke)", $params);
    }

    public static function preveriOceno(array $params) {
        return parent::query("SELECT idArtStrOcena"
                        . " FROM ArtikelStrankaOcena"
                        . " WHERE idArtikla = :idArtikla AND idStranke = :idStranke", $params);
    }

    public static function oceniArtikel(array $params){
        return parent::modify("UPDATE Artikel SET ocena = :ocena, steviloOcen = :steviloOcen"
                        . " WHERE idArtikla = :idArtikla", $params); 

    }


    
}
