<?php



require_once("model/eshopDB.php");
require_once("ViewHelper.php");

class adminController {

    public static function seznamProdajalcev(){

            $Prodajalci = eshopDB::getProdajalci();

            echo ViewHelper::render("view/layout.php", "view/admin/seznamProdajalcev.php", ["Prodajalci" => $Prodajalci]);
    
    }

    public static function seznamProdajalcevEdit(){

        $urejanjeProdajalca = filter_input_array(INPUT_POST, self::getRulesUrediProdajalca());
        #var_dump($urejanjeNarocila);
        #exit();

        if($urejanjeProdajalca["ukaz"] == "deaktiviraj"){
            eshopDB::deaktivirajProdajalca($urejanjeProdajalca);
        }

        else if($urejanjeProdajalca["ukaz"] == "aktiviraj"){
            eshopDB::aktivirajProdajalca($urejanjeProdajalca);
        }

       

        ViewHelper::redirect(BASE_URL . "admin/prodajalci" );
       
        
            
    }



    public static function urediProdajalcaForm(){
        
        

        echo ViewHelper::render("view/layout.php", "view/admin/urediProdajalca.php");

    }

    public static function urediProdajalcaSubmit(){
        
        $rules = self::getRulesEditProfil();
        
        $data = filter_input_array(INPUT_POST, $rules);

        
        if($data["geslo"] != NULL){
            #$mail = [$data["mailStranke"]];
            $input["idProdajalca"] = $data["idProdajalca"];
           
            

            $Prodajalec = eshopDB::getProdajalecByID($input);
            
            
            $input["geslo"] = password_hash($data["geslo"], PASSWORD_BCRYPT);
            

            if(password_verify($data["trenutnoGeslo"], $Prodajalec[0]["geslo"])){
                
                #$_SESSION["stranka"] = $data["mailStranke"];
                eshopDB::urejanjeGeslaProdajalecID($input);
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "admin/prodajalci" );

                #exit();

            #exit();
            }else{
                
                $vars["idProdajalca"] = $input["idProdajalca"];
                $vars["error"] = "Vnešeno geslo je napačno";
                
                echo ViewHelper::render("view/layout.php", "view/admin/urediProdajalca.php", [$vars => $vars]);
                #var_dump("sadasdas");
            }

        }
        
        
        else if($data["uporabniskoIme"] != NULL){
            
           
            
            
            $input["ime"] = $data["uporabniskoIme"];
            
            if(filter_var($_GET["idProdajalca"], FILTER_VALIDATE_INT)){
                $input["id"] = $_GET["idProdajalca"];
            } else{
                echo("link variable not ok, set error screen"); 
                exit();
            }
            
            
            
            
            #exit();
           
            eshopDB::urejanjeUporabniskegaImenaP($input);
                
            #var_dump("JAJA");
            ViewHelper::redirect(BASE_URL . "admin/prodajalci" );



        }else{
            $err = "Vnesite podatke!";
            echo ViewHelper::renderRegError("view/layout.php", "view/admin/urediProdajalca.php", $values, $err);
        }

    }

    public static function adminPrijavaForm($values = [
        "eMail" => "",
        "geslo" => "",
    ]) {
        $err = "";
        echo ViewHelper::renderRegError("view/layout.php", "view/admin/vpisAdmin.php", $values, $err);
    }

    public static function adminPrijavaSubmit() {
        $data = filter_input_array(INPUT_POST, self::getRulesRegistracija());

        if(adminController::preveriAdminCert($data["mail"])){
        # Preverimo, če je email naslov ustrezen
            if(!filter_var($data['eMail'], FILTER_VALIDATE_EMAIL)){
           
                $err = "Email naslov in geslo se ne ujemata";
                echo ViewHelper::renderRegError("view/layout.php", "view/admin/vpisAdmin.php", $values, $err);
                exit();
            }
        
       
     
            #$mail = [$data["mailStranke"]];
            $Admin = eshopDB::getAdmin($data);
            #var_dump($Admin);
            #exit();
        
       
        
            if(password_verify($data["geslo"],$Admin[0]["geslo"])){
           
                session_destroy();
                session_regenerate_id();
                session_start();
                $_SESSION["adminCert"] = 1;
                
                $_SESSION["tipUporabnika"] = "admin";
                echo ViewHelper::redirect(BASE_URL. "trgovina");
           

                exit();
            }else{
                $err = "Email naslov in geslo se ne ujemata";
                echo ViewHelper::renderRegError("view/layout.php", "view/admin/vpisAdmin.php", $values, $err);
            }
        }        
    }

    public static function spremeniGeslo() {
        echo ViewHelper::render("view/layout.php", "view/admin/profilAdmin.php");
    }

    public static function spremeniGesloSubmit() {
        $rules = self::getRulesEditProfil();
        
        
   
        
        
        
       
        $data = filter_input_array(INPUT_POST, $rules);
        #var_dump($data);
        #exit();

        $Admin = eshopDB::getAdminID();

        #var_dump($data);
        #exit();

            
        #$input["mailStranke"] = $_SESSION["mailStranke"];
        $input["geslo"] = password_hash($data["geslo"], PASSWORD_BCRYPT);
       
        #var_dump($input);
        #exit();
        
            #$mail = [$data["mailStranke"]];
            
            

            if(password_verify($data["trenutnoGeslo"], $Admin[0]["geslo"])){
                #$_SESSION["stranka"] = $data["mailStranke"];
                eshopDB::urejanjeGeslaAdmin($input);
                
                #var_dump("JAJA");
                ViewHelper::redirect(BASE_URL . "" );

                exit();

            exit();
            }else{
                $err = "Vpisano trenutno geslo je napačno";
                echo ViewHelper::renderRegError("view/layout.php", "view/admin/profilAdmin.php", $values, $err);
            }

        



       
     
    }
    
    public static function ustvariProdajalcaForm(){

        echo ViewHelper::render("view/layout.php", "view/admin/ustvariProdajalca.php");

       

    
    }

    public static function ustvariProdajalcaSubmit(){

        $data = filter_input_array(INPUT_POST, self::getRulesRegistracija());

        #var_dump($data);
        #exit();
       
        if(!filter_var($data['eMail'], FILTER_VALIDATE_EMAIL)){
           
            $err = "Prosimo vnesite validen e-mail";
            echo ViewHelper::renderRegError("view/layout.php", "view/admin/prodajalec/ustvari.php", $values, $err);
            
        }
        
         

        # Preverimo, če se gesli ujemata
        else if($data["geslo"] != $data["gesloPonovi"]){
            
            $err = "Gesli se ne ujemata";
            echo ViewHelper::renderRegError("view/layout.php", "view/admin/prodajalec/ustvari.php", $values, $err);
           
        }

        
        
        else{
            $data["geslo"] = password_hash($data["geslo"], PASSWORD_BCRYPT);
            $id = eshopDB::ustvariProdajalca($data);
            
            echo ViewHelper::redirect(BASE_URL. "trgovina");
        }
        
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
            'imeProdajalca' => FILTER_SANITIZE_SPECIAL_CHARS,
            'priimekProdajalca' => FILTER_SANITIZE_SPECIAL_CHARS,
            'eMail' => FILTER_SANITIZE_EMAIL,
            'gesloStranke' => FILTER_SANITIZE_SPECIAL_CHARS,
            'gesloPonovi' => FILTER_SANITIZE_SPECIAL_CHARS,
            'uporabniskoIme' => FILTER_SANITIZE_SPECIAL_CHARS,
            'geslo' => FILTER_SANITIZE_SPECIAL_CHARS,
            'eMail' => FILTER_SANITIZE_EMAIL,
            
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
            'idStranke' => FILTER_VALIDATE_INT,
            'idProdajalca' => FILTER_VALIDATE_INT,
            
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

    private static function getRulesUrediProdajalca() {
        return [
            'idProdajalca' => FILTER_VALIDATE_INT,
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


    public static function preveriAdminCert($data) {

        $adminCert = filter_input(INPUT_SERVER,"SSL_CLIENT_CERT");
        $adminCertData = openssl_x509_parse($adminCert);
        $common_name = $adminCertData['subject']['emailAddress'];
        if($common_name == 'admin@frajer.sem'){
            return true;
        }
        else{
            
            return false;
            
        }
        

    }


    

}
