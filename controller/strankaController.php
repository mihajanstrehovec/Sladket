<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once("model/eshopDB.php");
require_once("ViewHelper.php");

class strankaController {


    public static function dodajVkosarico() {
        $validationRules = [
            'do' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    // dopustne vrednosti spremenljivke do, popravi po potrebi
                    "regexp" => "/^(add_into_cart|purge_cart|update_cart)$/"
                ]
            ],
            'idArtikla' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 0]
            ],
            'quantity' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [    
                    'regexp' => "/^(0,1,2,3,4,5,6,7,8,9,10)$/"]
            
            ]
            
        ];
        $post = filter_input_array(INPUT_POST, $validationRules);
       ;
       
        switch ($post["do"]) {
            case "add_into_cart":
                try {
                    $Artikel = eshopDB::get($post);
                    #var_dump($Artikel);
                    #exit();
                    if (isset($_SESSION["cart"][$Artikel["idArtikla"]])) {
                        $_SESSION["cart"][$Artikel["idArtikla"]]++;
                        
                    } else {
                        $_SESSION["cart"][$Artikel["idArtikla"]] = 1;
                    }
                } catch (Exception $exc) {
                    die($exc->getMessage());
                }
                break;
                
                
            case "purge_cart":
                unset($_SESSION["cart"]);
                echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
                exit();
                break;
            
            case "update_cart": //Posodabljanje vozička
                #$url = filter_input(INPUT_SERVER, "PHP_SELF");
                #var_dump($url);
               # exit();
                $_SESSION["cart"][$_POST["idArtikla"]] = max($_POST["quantity"], 0); // V $_SESSION arr na index
                                                                              // knjige vstavimo novo število knjig
                                                                              // ki smo ga prebrali iz forme
                echo ViewHelper::redirect(BASE_URL . "/artikel?idArtikla=" . $_POST["idArtikla"]/*. "books?id=" . $id*/);
                exit();
                break;
            
            
            default:
               
                break;

               
               
            
        }
        echo ViewHelper::redirect(BASE_URL . "/artikel?idArtikla=" . $post["idArtikla"]);
    }


    public static function zakljucekNakupa() {

        $Narocilo = [];
        
            for($i = 0; $i < 200; $i++){
                if($_SESSION["cart"][$i] != NULL){
                    #echo($_SESSION["cart"][$i]);
                    
                    $id["idArtikla"] = $i;
                    $Artikel = eshopDB::get($id);

                    array_push($Narocilo, $Artikel);
                }
            }

            #var_dump($Narocilo);
            #exit();
        
        echo ViewHelper::render("view/layout.php", "view/stranka/zakljucekNakupa.php", ["Narocilo" => $Narocilo]);
        
    
    }

    public static function oddajNarocilo() {
        $data = filter_input_array(INPUT_POST, self::getRulesOddajNarocilo());
        $idStranke = eshopDB::getStrankaID($_SESSION);
        #var_dump(intval($idStranke[0]["idStranke"]));
        #exit();
        
        $narociloInput["total"] = floatval($_SESSION['total']);
        $narociloInput["idStranke"] = intval($idStranke[0]["idStranke"]);
        $narociloInput["potrjeno"] = 0;
       

        $id = eshopDB::insertNarocilo($narociloInput);

        for($i = 0; $i < 200; $i++){
            if($_SESSION["cart"][$i] != NULL){
                #echo($_SESSION["cart"][$i]);
                
                $narociloIn["idArtiklaForeign"] = $i;
                $narociloIn["kolicina"] = $_SESSION["cart"][$i];
                $narociloIn["idNarocilaForeign"] = $id;
                
                eshopDB::insertNarociloArtikel($narociloIn);
            }
        }

        #var_dump($narociloIn);
        #exit();
        
        unset($_SESSION["cart"]);
        unset($_SESSION["total"]);
        ViewHelper::redirect(BASE_URL . "profil/narocila" );
        
    
    }

    public static function mojaNarocila() {
        $idStranke = eshopDB::getStrankaID($_SESSION);
        
        
        $id["idStranke"] = 1;
       
        $narocila = eshopDB::getNarocila($idStranke[0]);

        $Artikli = [];
        for($i = 0; $i < count($narocila); $i++){
            $idTrNarocila["idNarocila"] = $narocila[$i]["idNaročila"];
            
            array_push($Artikli, eshopDB::getNarociloArtikli($idTrNarocila));
        }

        $ArtikliInfo = [[]];

        
        echo ViewHelper::renderNarocila("view/layout.php", "view/stranka/mojaNarocila.php", ["narocila" => $narocila], ["imenaNarocil" => $ArtikliInfo]);
        
        
        
    
    }

    public static function registracijaForm($values = [
        "email" => "",
        "uIme" => "",
        "geslo" => "",
        "ime" => "",
        "priimek" => "",
        "hisnaSt" => "",
        "ulica" => "",
        "posta" => "",
        "postnaSt" => "",
        "captcha" => "",
    ]) {
        $err = "";
        echo ViewHelper::renderRegError("view/layout.php", "view/stranka/register.php", $values, $err);
    }

    public static function potrditvenaKoda() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracijaStranka());

        #var_dump($data);
        #var_dump($_SESSION);
        #exit();
        # Preverimo, če je captcha naslov ustrezen
        if($data["captcha"] != $_SESSION["captcha_code"]){
            $err = "Vnesite pravilno Captcho";
            echo ViewHelper::renderRegError("view/layout.php", "view/stranka/register.php", $values, $err);
        }

        if(!filter_var($data['mailStranke'], FILTER_VALIDATE_EMAIL)){
           
            $err = "Prosimo vnesite validen e-mail";
            echo ViewHelper::renderRegError("view/layout.php", "view/stranka/register.php", $values, $err);
            
        }
        
        # Preverimo, če se gesli ujemata
        else if($data["gesloStranke"] != $data["gesloPonovi"]){
            
            $err = "Gesli se ne ujemata";
            echo ViewHelper::renderRegError("view/layout.php", "view/stranka/register.php", $values, $err);
           
        }

        
        
        else if (self::checkValues($data)) {

            $data["gesloStranke"] = password_hash($data["gesloStranke"], PASSWORD_BCRYPT);

            $data["potrditvenaKoda"] = rand(100000,999999);
            

            


            $mail = new PHPMailer(true);

                // Pošiljanje potrditvene kode preko phpmailer  
                try{
                
                $mail->isSMTP();                                            
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth   = true; 
                                  
                $mail->Username   = 'mihec.strehci@gmail.com';                    
                $mail->Password   = '<password>';     
                $mail->Port = 587;                       
                $mail->SMTPSecure = tls;         
              
                $mail->setFrom('sladkizob.info@gmail.com', 'sladket');
                $mail->addAddress($data["mailStranke"]);     
                
               
                
                $mail->isHTML(true);                                  
                $mail->Subject = 'Potrditvena koda';
                $mail->Body    = 'Pozdravljeni, pošiljamo vam vašo potrditveno kodo: <b>'. $data["potrditvenaKoda"] . '</b>';
              
                $mail->send();
                    } catch (Exception $e) {
                 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                
        

            echo ViewHelper::render("view/layout.php", "view/stranka/emailPotrditev.php", ["data" => $data]);
            
            }
    }

    public static function registracijaSubmit() {
        
            $data = $_POST;
            
            // Preverjanje potrditvene kode
            if($data["vnesenaPotrditvenaKoda"] == $data["potrditvenaKoda"]){
                
                $id = eshopDB::ustvariStranko($data);
            
                session_destroy();
                session_regenerate_id();
                session_start();
                $_SESSION["mailStranke"] = $data["mailStranke"];
                $_SESSION["tipUporabnika"] = "stranka";
                
                echo ViewHelper::redirect(BASE_URL. "trgovina");

                
            } else {
                $err = "Napačna potrditvena koda.";
                echo viewHelper::renderRegError("view/layout.php", "view/stranka/emailPotrditev.php", ["data" => $data], $err);
            }
            
            
            
      
    }


    public static function vpisForm($values = [
        "mailStranke" => "",
        "gesloStranke" => "",
    ]) {
        $err = "";
        echo ViewHelper::renderRegError("view/layout.php", "view/stranka/vpis.php", $values, $err);
    }

    public static function vpisSubmit() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracija());


        # Preverimo, če je email naslov ustrezen
        if(!filter_var($data['mailStranke'], FILTER_VALIDATE_EMAIL)){
           
            $err = "Email naslov in geslo se ne ujemata";
            echo ViewHelper::renderRegError("view/layout.php", "view/stranka/vpis.php", $values, $err);
            exit();
            
        }
        
        # Preverimo, če se gesli ujemata
        $rules = [
            "mailStranke" => [
                'filter' => FILTER_VALIDATE_EMAIL,
                
            ]
        ];

        $mail = filter_input_array(INPUT_POST, $rules);
     
        #$mail = [$data["mailStranke"]];
        $Stranka = eshopDB::getStranka($mail);
        #var_dump($Stranka);
        #var_dump($password_hash($data["gesloStranke"], PASSWORD_BCRYPT));
        #exit();
        
       

        if(password_verify($data["gesloStranke"], $Stranka[0]["gesloStranke"])){
            if($Stranka[0]["aktivirana"] == 1){
                session_destroy();
                session_regenerate_id();
                session_start();
                $_SESSION["mailStranke"] = $data["mailStranke"];
                $_SESSION["tipUporabnika"] = "stranka";
                echo ViewHelper::redirect(BASE_URL. "trgovina");
            }else{
                $err = "Vaš račun je bil deaktiviran.";
                echo ViewHelper::renderRegError("view/layout.php", "view/stranka/vpis.php", $values, $err);
            }

        exit();
        }else{
            $err = "Email naslov in geslo se ne ujemata";
            echo ViewHelper::renderRegError("view/layout.php", "view/stranka/vpis.php", $values, $err);
        }

        
    }

    public static function profil() {
        $Stranka = eshopDB::getStrankaNaslov($_SESSION);
        echo ViewHelper::render("view/layout.php", "view/stranka/profil.php", ['Stranka' => $Stranka]);
    }

    public static function editProfil() {
        $rules = self::getRulesEditProfil();
        
        
   
        
        
        
       
        $data = filter_input_array(INPUT_POST, $rules);
        #var_dump($data["mailStranke"], $_SESSION);
        #exit();

        
       
        
        if($data["mailStranke"] == NULL){
            #$mail = [$data["mailStranke"]];
            $Stranka = eshopDB::getStranka($_SESSION);
            
            $input["mailStranke"] = $_SESSION["mailStranke"];
            $input["gesloStranke"] = password_hash($data["gesloStranke"], PASSWORD_BCRYPT);
            

            if(password_verify($data["trenutnoGeslo"], $Stranka[0]["gesloStranke"])){
                #$_SESSION["stranka"] = $data["mailStranke"];
                eshopDB::urejanjeGesla($input);
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );

                exit();

            exit();
            }else{
                $err = "Vnešeno geslo je napačno";
                echo ViewHelper::renderRegError("view/layout.php", "view/stranka/profil.php", $values, $err);
            }

        }

        if($data["mailStranke"] != NULL){
            
           
            
            $input["mailStranke"] = $_SESSION["mailStranke"];
            $input["noviMailStranke"] = $data["mailStranke"];
            
                    
                eshopDB::urejanjeMaila($input);
                $_SESSION["mailStranke"] = $input["noviMailStranke"];   
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );



        }



       
     
    }

    public static function editProfilNaslov() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracijaStranka());

        
        # Preverimo, če je email naslov ustrezen
       
        $data["mailStranke"] = $_SESSION["mailStranke"];
        
        
       
            #var_dump($data);
            #exit();
        eshopDB::urediNaslov($data);

      
            
        echo ViewHelper::redirect(BASE_URL. "trgovina");
            
      
    }


    /**
     * Returns TRUE if given $input array contains no FALSE values
     * @param type $input
     * @return type
     */
    private static function checkValues($input) {
        if (empty($input)) {
            return FALSE;
        }

        $result = TRUE;
        foreach ($input as $value) {
            $result = $result && $value != false;
        }

        return $result;
    }

    /**
     * Returns an array of filtering rules for manipulation books
     * @return type
     */
    private static function getRules() {
        return [
            'imeArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'cenaArtikla' => FILTER_VALIDATE_FLOAT,
            'opisArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'kategorijaArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'zalogaArtikla' => FILTER_VALIDATE_FLOAT,
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    

    private static function getRulesEdit() {
        return [
            'imeArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'cenaArtikla' => FILTER_VALIDATE_FLOAT,
            'opisArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'kategorijaArtikla' => FILTER_SANITIZE_SPECIAL_CHARS,
            'zalogaArtikla' => FILTER_VALIDATE_FLOAT,
    
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesRegistracija() {
        return [
            'imeStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'priimekStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'mailStranke' => FILTER_SANITIZE_EMAIL,
            'gesloStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'gesloPonovi' => FILTER_SANITIZE_SPECIAL_CHARS,
            'uporabniskoIme' => FILTER_SANITIZE_SPECIAL_CHARS,
            'geslo' => FILTER_SANITIZE_SPECIAL_CHARS,
            
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesRegistracijaStranka() {
        return [
            'imeStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'priimekStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'mailStranke' => FILTER_SANITIZE_EMAIL,
            'gesloStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'gesloPonovi' => FILTER_SANITIZE_SPECIAL_CHARS,
            "hisnaSt" => FILTER_SANITIZE_SPECIAL_CHARS,
            "ulica" => FILTER_SANITIZE_SPECIAL_CHARS,
            "posta" => FILTER_SANITIZE_SPECIAL_CHARS,
            "postnaSt" => FILTER_VALIDATE_INT,
            "captcha" => FILTER_VALIDATE_INT,
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    

    private static function getRulesEditProfil() {
        return [
            'gesloStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'trenutnoGeslo' => FILTER_SANITIZE_SPECIAL_CHARS,
            'mailStranke' => FILTER_SANITIZE_EMAIL,
            'uporabniskoIme' => FILTER_SANITIZE_EMAIL,
            'geslo' => FILTER_SANITIZE_SPECIAL_CHARS,
            
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesOddajNarocilo() {
        return [
            'total' => FILTER_VALIDATE_FLOAT,
            
            
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesUrediNarocilo() {
        return [
            'idNarocila' => FILTER_VALIDATE_INT,
            'ukaz' => FILTER_SANITIZE_SPECIAL_CHARS
            
            
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }

    private static function getRulesUrediStranko() {
        return [
            'idStranke' => FILTER_VALIDATE_INT,
            'ukaz' => FILTER_SANITIZE_SPECIAL_CHARS
            
            
            
            /*'year' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => [
                    'min_range' => 1800,
                    'max_range' => date("Y")
                ]
            ]*/
        ];
   
    }
    
    public static function oceniArtikel() {
        
        $idStranke = eshopDB::getStrankaID($_SESSION);
        $params ["idArtikla"] = intval($_POST["idArtikla"]);
        $params ["idStranke"] = intval($idStranke[0]["idStranke"]);
        
        $paramsOceni ["ocena"] = intval($_POST["ocena"] + $_POST["submitOcena"]);
        $paramsOceni["steviloOcen"] = intval($_POST["steviloOcen"] + 1);
        $paramsOceni["idArtikla"] = $_POST["idArtikla"];
        
        
        //preverimo ali artikel ze ima oceno uporabnika
        if(eshopDB::preveriOceno($params) == null){
            #var_dump($idStranke);
                #exit();
            eshopDB::zabeležiOceno($params);
            eShopDB::oceniArtikel($paramsOceni);
            

        } else {
            
            
            
        }
        echo ViewHelper::redirect(BASE_URL . "/artikel?idArtikla=" . $_POST["idArtikla"]);
        
    }


  
}

?>
