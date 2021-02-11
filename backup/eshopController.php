<?php



require_once("model/eshopDB.php");
require_once("ViewHelper.php");

class eshopController {

    public static function index() {
            
      
            
            

        
            $Artikli = eshopDB::getAll();
         

                
          

           
       
            echo ViewHelper::render("view/layout.php", "view/trgovina.php", [
                "Artikli" => $Artikli
            ]);
        
    }

    
    
    public static function artikel() {
            if (empty($Artikel)) {
            $rules = [
                "idArtikla" => [
                    'filter' => FILTER_VALIDATE_INT,
                    'options' => ['min_range' => 1]
                ]
            ];

            $data = filter_input_array(INPUT_GET, $rules);

            if (!self::checkValues($data)) {
                throw new InvalidArgumentException();
            }

            $Artikel = eshopDB::get($data);
        }
            echo ViewHelper::render("view/layout.php", "view/artikel.php", [
                "Artikel" => $Artikel
            ]);
        
    }

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
        
            for($i = 0; $i < 100; $i++){
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

        for($i = 0; $i < 100; $i++){
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
        #var_dump($narocila[0]);
        #exit();
        $Artikli = [];
        for($i = 0; $i < count($narocila); $i++){
            $idTrNarocila["idNarocila"] = $narocila[$i]["idNaročila"];
            #var_dump($idTrNarocila);
            #exit();
            
            array_push($Artikli, eshopDB::getNarociloArtikli($idTrNarocila));
        }
        #var_dump($narocila[7]);
        #var_dump("ARTIKLI");
        #var_dump($Artikli[7]);
        #exit();

        $ArtikliInfo = [[]];

        
        #var_dump($narocila[1]);
        #var_dump($narocila[0]);
        #echo("HALLLLLLLLLLLLLLLLLLLLl");
        #var_dump($ArtikliInfo[0]);
       #exit();

        #$oddanaNarocila = eshopDB::oddanaNarocila($idStranke);
        #$potrjenaNarocila = eshopDB::potrjenaNarocila($idStranke);
        #$preklicanaNarocila = eshopDB::preklicanaNarocila($idStranke);
        #$storniranaNarocila = eshopDB::storniranaNarocila($idStranke);
        
        echo ViewHelper::renderNarocila("view/layout.php", "view/stranka/mojaNarocila.php", ["narocila" => $narocila], ["imenaNarocil" => $ArtikliInfo]);
        
        
        
    
    }

    public static function prodajalecNarocila() {
        #$idStranke = eshopDB::getStrankaID($_SESSION);
        
        
        #$id["idStranke"] = 1;
       
        $narocila = eshopDB::getNarocilaAll(); # Dobimo vsa naročila
        #var_dump($narocila[0]);
        #exit();
        $Artikli = [];

        

        $ArtikliInfo = [[]];

        
        echo ViewHelper::renderNarocila("view/layout.php", "view/prodajalec/narocilaProdajalec.php", ["narocila" => $narocila], ["imenaNarocil" => $ArtikliInfo]);
        
        
        
    
    }

    public static function prodajalecNarocilaEdit() {
        
        $urejanjeNarocila = filter_input_array(INPUT_POST, self::getRulesUrediNarocilo());
        #var_dump($urejanjeNarocila);
        #exit();

        if($urejanjeNarocila["ukaz"] == "potrdi"){
            eshopDB::potrdiNarocilo($urejanjeNarocila);
        }

        else if($urejanjeNarocila["ukaz"] == "preklici"){
            eshopDB::prekliciNarocilo($urejanjeNarocila);
        }

        else if($urejanjeNarocila["ukaz"] == "storniraj"){
            eshopDB::stornirajNarocilo($urejanjeNarocila);
        }

        ViewHelper::redirect(BASE_URL . "prodajalec/narocila" );
       
        
            
    }


    public static function prodajalecStranke() {
        

        $Stranke = eshopDB::getStranke();


        
        echo ViewHelper::render("view/layout.php", "view/prodajalec/prodajalecStranke.php", ["Stranke" => $Stranke]);
        
        
        
    
    }

    public static function prodajalecStrankeEdit() {
        
        $urejanjeStranke = filter_input_array(INPUT_POST, self::getRulesUrediStranko());
        #var_dump($urejanjeNarocila);
        #exit();

        if($urejanjeStranke["ukaz"] == "deaktiviraj"){
            eshopDB::deaktivirajStranko($urejanjeStranke);
        }

        else if($urejanjeStranke["ukaz"] == "aktiviraj"){
            eshopDB::aktivirajStranko($urejanjeStranke);
        }

        else if($urejanjeStranke["ukaz"] == "storniraj"){
            eshopDB::stornirajNarocilo($urejanjeStranke);
        }

        ViewHelper::redirect(BASE_URL . "prodajalec/stranke" );
       
        
            
    }

    public static function prodajalecProfil() {
        
        
        echo ViewHelper::render("view/layout.php", "view/prodajalec/profilProdajalec.php", ["Stranke" => $Stranke]);
       
        
            
    }

    public static function prodajalecProfilSubmit() {
        $rules = self::getRulesEditProfil();
        
        
   
        
        
        
       
        $data = filter_input_array(INPUT_POST, $rules);
        #var_dump($data, $_SESSION);
        #exit();

        
       
        
        if($data["geslo"] != NULL){
            #$mail = [$data["mailStranke"]];
            $input["uporabniskoIme"] = $_SESSION["prodajalec"];
            $Prodajalec = eshopDB::getProdajalec($input);
            
            
            $input["geslo"] = $data["geslo"];
            

            if($data["trenutnoGeslo"] == $Prodajalec[0]["geslo"]){
                #$_SESSION["stranka"] = $data["mailStranke"];
                eshopDB::urejanjeGeslaProdajalec($input);
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );

                #exit();

            #exit();
            }else{
                $err = "Vnešeno geslo je napačno";
                echo ViewHelper::renderRegError("view/layout.php", "view/prodajalec/profilProdajalec.php", $values, $err);
            }

        }

        if($data["uporabniskoIme"] != NULL){
            
           
            
            $input["uporabniskoIme"] = $_SESSION["prodajalec"];
            $input["novoUporabniskoIme"] = $data["uporabniskoIme"];
            

           
                eshopDB::urejanjeUporabniskegaImena($input);
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );



        }



       
     
    }
    


    public static function prodajalecVpis($values = [
        "uporabiskoIme" => "",
        "geslo" => "",
    ]) {
        $err = "";
        echo ViewHelper::renderRegError("view/layout.php", "view/prodajalec/vpisProdajalec.php", $values, $err);
    }

    public static function prodajalecVpisSubmit() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracija());

        #var_dump($data);
        #exit();
        
        
        
       
     
        #$mail = [$data["mailStranke"]];
        $Prodajalec = eshopDB::getProdajalec($data);
        #var_dump($Prodajalec[0]["geslo"]);
        #exit();
        
       

        if($data["geslo"] == $Prodajalec[0]["geslo"]){
            
                session_destroy();
                session_regenerate_id();
                session_start();
                $_SESSION["prodajalec"] = $data["uporabniskoIme"];
                $_SESSION["tipUporabnika"] = "prodajalec";
                echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
           

        
        }else{
            $err = "Uporabniško ime in geslo se ne ujemata";
            echo ViewHelper::renderRegError("view/layout.php", "view/prodajalec/vpisProdajalec.php", $values, $err);
        }

        
        

        
        /*
        else if (self::checkValues($data)) {
            $id = eshopDB::insert($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina");
            
        } else {
            self::addForm($data);
        }*/
    }



    
    

    public static function addForm($values = [
        "imeArtikla" => "",
        "cenaArtikla" => "",
        "opisArtikla" => "",
        "kategorijaArtikla" => "",
        "zalogaArtikla" => "",
    ]) {
        echo ViewHelper::render("view/layout.php", "view/prodajalec/dodajArtikel.php", $values);
    }

    
    public static function add() {
        $data = filter_input_array(INPUT_POST, self::getRules());
        
        if (self::checkValues($data)) {
            $id = eshopDB::insert($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
            
        } else {
            self::addForm($data);
        }
    }
    public static function izpisi() {
        
        session_destroy();
        echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
            
        
    }


    public static function registracijaForm($values = [
        "email" => "",
        "uIme" => "",
        "geslo" => "",
        "ime" => "",
        "priimek" => "",
    ]) {
        $err = "";
        echo ViewHelper::renderRegError("view/layout.php", "view/stranka/register.php", $values, $err);
    }

    public static function registracijaSubmit() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracija());


        # Preverimo, če je email naslov ustrezen
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
            
            $id = eshopDB::ustvariStranko($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina");
            
        } else {
            self::addForm($data);
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
        #exit();
        
       

        if($data["gesloStranke"] == $Stranka[0]["gesloStranke"]){
            if($Stranka[0]["aktivirana"] == 1){
                session_destroy();
                session_regenerate_id();
                session_start();
                $_SESSION["mailStranke"] = $data["mailStranke"];
                $_SESSION["tipUporabnika"] = "stranka";
                echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
            }else{
                $err = "Vaš račun je bil deaktiviran.";
                echo ViewHelper::renderRegError("view/layout.php", "view/stranka/vpis.php", $values, $err);
            }

        exit();
        }else{
            $err = "Email naslov in geslo se ne ujemata";
            echo ViewHelper::renderRegError("view/layout.php", "view/stranka/vpis.php", $values, $err);
        }

        
        

        
        /*
        else if (self::checkValues($data)) {
            $id = eshopDB::insert($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina");
            
        } else {
            self::addForm($data);
        }*/
    }



    public static function editForm($Artikel = []) {
        if (empty($Artikel)) {
            $rules = [
                "idArtikla" => [
                    'filter' => FILTER_VALIDATE_INT,
                    'options' => ['min_range' => 1]
                ]
            ];

            $data = filter_input_array(INPUT_GET, $rules);

            if (!self::checkValues($data)) {
                throw new InvalidArgumentException();
            }

            $Artikel = eshopDB::get($data);
        }

        echo ViewHelper::render("view/layout.php", "view/prodajalec/urediArtikel.php", ["Artikel" => $Artikel]);
    }

    public static function edit() {
        $rules = self::getRulesEdit();
        
        
   
        $rules["idArtikla"] = [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1]
        ];

        
        
       
        $data = filter_input_array(INPUT_POST, $rules);
        #var_dump($data);
        #exit();
       
        if (self::checkValues($data)) {
            eshopDB::update($data);
            ViewHelper::redirect(BASE_URL . "" );
        } else {
           
            
            self::editForm($data);
            
        }
    }

    public static function profil() {
        echo ViewHelper::render("view/layout.php", "view/stranka/profil.php");
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
            $input["gesloStranke"] = $data["gesloStranke"];
            

            if($data["trenutnoGeslo"] == $Stranka[0]["gesloStranke"]){
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
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );



        }



       
     
    }
    

    public static function delete() {
        $rules = [
            'delete_confirmation' => FILTER_REQUIRE_SCALAR,
            'idArtikla' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];
        $data = filter_input_array(INPUT_POST, $rules);
        
        if (self::checkValues($data)) {
            eshopDB::delete($data);
            $url = BASE_URL;
        } else {
            if (isset($data["id"])) {
                $url = BASE_URL . "artikel/uredi?id=" . $data["id"];
            } else {
                $url = BASE_URL;
            }
        }

        ViewHelper::redirect($url);
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


   


    

}
