<?php
require_once 'db_files/db_artikel.php';
require_once "model/eshopDB.php";
?>



<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
        
        <!-- KATEGORIJE -->
        <div class ="kategorije" align ="center" 
        style ="padding: 1%; font-size: 1.2em; text-decoration: none; color: black; background: none; ">
            
            
            <div class = "link" id ="kat1">
                <a id = "k1l" href ="<?= BASE_URL . "trgovina" ?>?kategorija=Kornet"> Kornet</a>
            </div>
            

            <div class = "link" id ="kat2">
                <a id = "k2l" href ="<?= BASE_URL . "trgovina" ?>?kategorija=Na%20žlico"> Na žlico </a>
            </div>

            <div class = "link" id ="kat3">
                <a id = "k3l" href ="<?= BASE_URL . "trgovina" ?>?kategorija=Kepca"> Kepca</a>
            </div>
            
            <div class = "link" id ="kat4">
                <a id = "k4l"  href ="<?= BASE_URL . "trgovina" ?>?kategorija=Piškotek"> Piškotek</a>
            </div>
        </div>
        
        <!-- NASLOV KATEGORIJE -->
        <div class ="kategorijeTitle" align ="center" style ="padding-top: 0.8vh;  height: 5vh;">
         
            <h4 style ="font-weight: 600;"> KATEGORIJE</h4>
            
        </div>

        <!-- NASLOV ARTIKLI -->
        <div class ="title" align ="center" style ="padding-top: 0.4vh;">
            
            <h4 style ="font-weight: 600;"> ARTIKLI</h4>
        
        </div>
        
       
        <div id ="scroller" class ="overflow-auto itemList" style = "padding: 4% 0% 4% 0%;">
            
            <!-- DIV, ki odreže artikle pred robom osnovnega kvadrata -->
            <div class = "overflow-auto containItems" style = "width: 100%; height: 100%; overflow-y: auto; overflow-x: none; " align= "center";>  

                <!-- For zanka, ki na začetni strani prikaže vse artikle (eshopDB::getAll()) -->
                <?php foreach ($Artikli as $Artikel): ?>
                    <!-- If stavki za preverjanje tipa uporabnika (shranjeno v $_SESSION ob prijavi) -->
                    
                    <?php if($_SESSION["tipUporabnika"] == "stranka" or $_SESSION["tipUporabnika"] == NULL):?>  <!-- STRANKA -->
                        <!-- If stavki za preverjanje stanja aktivnosti izdelka (1 => aktivirano, prikaži in obratno za 0) -->
                        <?php if($Artikel["aktiviran"] == 1 && $_GET["kategorija"] == NULL):?><!-- To prikažemo, ko je izdelek aktiviran in izbrana ni nobena kategorija -->
                                <a href ="<?= BASE_URL . "artikel?idArtikla=" . $Artikel["idArtikla"]?>">
                                    
                                    <div class ="item" style = "background-color: rgba(0,0,0,0);">
                                        
                                        <!-- Slika artikla -->
                                        <?php   $imeSlike = eshopDB::getImages($Artikel);   ?>
                                        <img src="<?= IMAGES_URL . "/products/". $imeSlike[0]["imeSlike"]?>" height= "1000px" style="width:100%; " class ="displayImage">

                                        <!-- Text pri artiklu -->
                                        <div id ="prikaznoImeArtikla" style ="margin-top: 15%; color: #515151; font-weight:bold!important; font-size: 2em;">
                                            <?=  $Artikel["imeArtikla"] ?> <br>
                                            <s style = "margin-right: 5px;"><?= $Artikel["cenaArtikla"] + rand(0, 30)?> €</s>
                                            <?= $Artikel["cenaArtikla"] ?>€ 
                                        </div>
                                    </div>

                                </a>
                                
                        <?php elseif($Artikel["aktiviran"] == 1 && $Artikel["kategorijaArtikla"] == $_GET["kategorija"]) :?> <!-- Ista funkcionalnost, kot zgornji if del, a upošteva da je kategorija izbrana -->
                                
                            <a href ="<?= BASE_URL . "/artikel?idArtikla=" . $Artikel["idArtikla"]?>">
                                    
                                    <div class ="item" style = "background-color: rgba(0,0,0,0);">
                                        
                                        <!-- Slika artikla -->
                                        <?php   $imeSlike = eshopDB::getImages($Artikel);   ?>
                                        <img src="<?= IMAGES_URL . "/products/". $imeSlike[0]["imeSlike"]?>" height = "1000px" style="width:100%; " class ="displayImage">

                                        <!-- Text pri artiklu -->
                                        <div id ="prikaznoImeArtikla" style ="margin-top: 15%;color: #515151;  font-weight:bold!important; font-size: 2em;">
                                            <?=  $Artikel["imeArtikla"] ?> <br>
                                            <s style = "margin-right: 5px;"><?= $Artikel["cenaArtikla"] + rand(0, 30)?> €</s>
                                            <?= $Artikel["cenaArtikla"] ?>€ 
                                        </div>
                                    </div>

                                </a>

                        <?php endif;?>
                    <!--  -->
                    <?php else:?> <!-- PRODAJALEC / ADMIN -->
                        <?php if($Artikel["aktiviran"] == 0):?> <!-- deaktiviran artikel, rdeče ime -->
                            <a href ="<?= BASE_URL . "artikel?idArtikla=" . $Artikel["idArtikla"]?>">
                                    
                                    <div class ="item" style = "background-color: rgba(0,0,0,0);">
                                        
                                        <!-- Slika artikla -->
                                        <?php   $imeSlike = eshopDB::getImages($Artikel);   ?>
                                        <img src="<?= IMAGES_URL . "/products/". $imeSlike[0]["imeSlike"]?>" height = "1000px" style="width:100%; " class ="displayImage">

                                        <!-- Text pri artiklu -->
                                        <div id ="prikaznoImeArtikla" style ="margin-top: 15%;color: red;  font-weight:bold!important; font-size: 2em;">
                                            <?=  $Artikel["imeArtikla"] ?> <br>
                                            <s style = "margin-right: 5px;"><?= $Artikel["cenaArtikla"] + rand(0, 30)?>€</s>
                                            <?= $Artikel["cenaArtikla"] ?>€ 
                                        </div>
                                    </div>

                                </a>
                        <?php else:?> <!-- aktiviran artikel, zeleno ime -->
                            <a href ="<?= BASE_URL . "artikel?idArtikla=" . $Artikel["idArtikla"]?>">
                                    
                                    <div class ="item" style = "background-color: rgba(0,0,0,0);">
                                        
                                        <!-- Slika artikla -->
                                        <?php   $imeSlike = eshopDB::getImages($Artikel);   ?>
                                        <img src="<?= IMAGES_URL . "/products/". $imeSlike[0]["imeSlike"]?>" height = "1000px" style="width:100%;" class ="displayImage">

                                        <!-- Text pri artiklu -->
                                        <div id ="prikaznoImeArtikla" style ="margin-top: 15%;color: green; font-weight:bold!important; font-size: 2em;">
                                            <?=  $Artikel["imeArtikla"] ?> <br>
                                            <s style = "margin-right: 5px;"><?= $Artikel["cenaArtikla"] + rand(0, 30)?> €</s>
                                            <?= $Artikel["cenaArtikla"] ?>€ 
                                        </div>
                                    </div>

                                </a>
                        <?php endif;?> 
                    <?php endif;?>    
                <?php endforeach; ?>
             </div>               
        </div>
    </div>
</div>

<script src = "<?= JS_URL . "kategorije.js"?>"></script>

<script src = "<?= JS_URL . "scroll.js"?>"></script>