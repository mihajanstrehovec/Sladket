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
            $Images = eshopDB::getImages($data);
            $Artikel["Images"] = $Images;
            }
            #var_dump($Artikel);
           # exit();


            echo ViewHelper::renderArtikel("view/layout.php", "view/artikel.php", ["Artikel" => $Artikel]);
        
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

    public static function izpisi() {
        
        session_destroy();
        echo ViewHelper::redirect(BASE_URL. "trgovina"/*. "books?id=" . $id*/);
            
        
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
