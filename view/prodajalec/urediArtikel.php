<?php
// TESTIRANJE //
#var_dump($Artikel);
#var_dump($values);
#exit();
?>


<!-- Style sheets -->
<link rel ="stylesheet" href ="<?= CSS_URL . "artikelStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "modalsUrediArtikel.css" ?>">
         

<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
       
        <div class ="titleArtikel" align ="center" style ="padding-top: 0.4vh;">
            <!-- Osnovni form za urejanje izdelkov, vmes se zaključi in nato nadaljuje s pomočjo id forme -->
            <form id = "urediArtikel" action ="<?= BASE_URL . "artikel/uredi" ?>" method = "POST" enctype="multipart/form-data">
                <input form = "urediArtikel" type = "hidden" name = "zalogaArtikla" value ="<?= $Artikel["zalogaArtikla"]?>" placeholder ="<?= $Artikel["zalogaArtikla"]?>">
                <input form = "urediArtikel" type = "hidden" name = "kategorijaArtikla" placeholder ="<?= $Artikel["kategorijaArtikla"]?>" value ="<?= $Artikel["kategorijaArtikla"]?>">
                <input form = "urediArtikel" type = "hidden" name = "idArtikla" value ="<?=$_GET['idArtikla']?>">
                <h4 style ="font-weight: 600;"><input form = "urediArtikel" type ="text" placeholder ="<?= $Artikel["imeArtikla"]?>" value = "<?= $Artikel["imeArtikla"]?>" name = "imeArtikla" style ="background-color: rgba(0,0,0,0); border: 0px; color: white;"></h4>
            </form>
        </div>
        
    
        <div class ="artikelVsebnik" style = "height: 70vh;">
            
            
            <div id ="opisIzdelka">
               
               <div id ="oArtiklu">
                O ARTIKLU
               </div>
               
               <div class ="overflow-auto" id="besediloOpisa">
                    <textarea form = "urediArtikel" placeholder="<?= $Artikel["opisArtikla"]?>" class="form-control" id="exampleFormControlTextarea1" rows="7" 
                    name ="opisArtikla" style ="width: 100%; float: left; margin-top: 20px; background-color: rgba(0,0,0,0); border: 0px; color: white;">
                        <?= $Artikel["opisArtikla"]?>
                    </textarea>
               
               </div>

            </div>
            
            <div id ="desno">
            
            <div class="slideshow-container">
                     <!-- Galerija slik -->
                    <div class="slideshow-container">

                        <!--For loop, ki prikazuje vse slike artikla-->
                        <?php for($i = 0; $i < count($Artikel["Images"]); $i++):?>
                            <div class="mySlides fade">
                                <div class="trenutnaSlika">
                                    HOLDER TEKST - NASTAVI SE Z JS
                                </div>
                                
                                <img src="<?= IMAGES_URL . "/products/". $Artikel["Images"][$i]["imeSlike"]?>" height = "200px" style="width:100%">
                                
                            </div>
                        <?php endfor;?>

                        <?php if($Artikel["Images"][1] != NULL):?>
                            <!-- Gumb za prejšno in naslednjo sliko -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        <?php endif;?>
                    </div>
                    
                    <br>
                
                <!-- FORM dodajanje slik -->
                <div  class = "form-group row" style = "margin: 20px 0px 0px 1px;">
                
                    <em style = "color: rgb(240, 210, 157); font-weight: 600;">Dodaj slike: </em><input form = "urediArtikel" type="file"  name="file[]" id="file" multiple>
                
                </div>

                <!-- GUMB brisanje slik -->
                <div  class = "form-group row" style = "margin: 20px 0px 0px 1px;">
                
                    <button class ="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Izbrisi slike</button>
            
                </div>

                <!-- Modal za brisanje fotografij -->
                <div class="modal fade bd-example-modal-lg modalIzbris" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modalIzbris-dialog">
                        <div class="modal-content modalIzbris-content" style = "color: black;">
                            
                            <h4 style = "margin-bottom: 5%;">Brisanje slik</h4>
                            
                            <div id = "image-gallery" class = "row no-gutters justify-content-center">
                                
                                <!-- FORM kjer izberemo slike za izbris s pomočjo check boxov, ki so zamenjani s sliko -->
                                <form action = "<?= BASE_URL . "artikel/izbrisi/slike?idArtikla=".$_GET['idArtikla'] ?>" method = "POST" id="brisiSlike">
                                    <?php for($i = 0; $i < count($Artikel["Images"]); $i++):?>
                                        <label>
                                            
                                            <input type="checkbox" class = "izbrisiSlikoC" name="izbraneSlike[]" value="<?=$Artikel["Images"][$i]["imeSlike"]?>">
                                            <img src="<?= IMAGES_URL . "/products/". $Artikel["Images"][$i]["imeSlike"]?>" height = "100px;">
                                            
                                        </label>
                                    <?php endfor;?>
                                </form>

                            </div>

                            <!-- SuBMIT GUMB ZA BRISANJE, KO GA PRITISNEMO, SE SLIKE IZBRIŠEJO IN NAS VRŽE NAZAJ NA ARTIKEL PAGE -->
                            <div class = "row justify-content-center" style = "margin-top: 2%">
                                <button form = "brisiSlike" type="submit" class="btn btn-danger">Izbrisi</button>
                            </div>

                        </div>
                    </div>
                </div>
                

                <!-- FORM cena -->
                <div class ="row no-gutters justify-content-center nakup" style = "margin-top: 1vh;">
                    <h5 style ="font-weight: 600; color: rgba(0, 0, 0, 0.7);">Cena:</h5> <input form ="urediArtikel" class="form-control" type="number" name="cenaArtikla" value="<?= $Artikel["cenaArtikla"]?>" id="example-number-input" style ="width: 20%; flaot: left; margin-top: 20px; background-color: rgba(0,0,0,0); border: 0px; color: rgba(89,145,144,0.7);;">
                </div>
               
               
                
                <div class ="row no-gutters justify-content-center dodVkos">
                    
                    <button form = "urediArtikel" type="submit" class="btn btn-light dodajVKos">POTRDI SPREMEMBE</button>
                    
                    <!-- Aktiviraj & Deaktiviraj izdelek -->
                    <?php if($Artikel["aktiviran"] == 1):?>

                        
                        <form action="<?= BASE_URL . "artikel/izbrisi" ?>" method="post" style="margin-top:1.5vh;">
                            <input type="hidden" name="idArtikla" value="<?= $Artikel["idArtikla"] ?>"  />
                            <label class = "text-danger">Deaktiviraj? <input type="checkbox" name="delete_confirmation" />
                            
                            
                            <button type="submit" class="btn btn-danger"  style ="margin-left: 10px;">Deaktiviraj artikel</button>
                        </form>

                    <?php elseif($Artikel["aktiviran"] == 0):?>

                        <form action="<?= BASE_URL . "artikel/aktiviraj" ?>" method="post" style="margin-top:1.5vh;">
                            <input type="hidden" name="idArtikla" value="<?= $Artikel["idArtikla"] ?>"  />
                            <label class = "text-success">Aktiviraj? <input type="checkbox" name="delete_confirmation" /></label>
                            <button type="submit" class="btn btn-success">Aktiviraj artikel</button>
                        </form>

                    <?php endif;?>

                    
            </div> 

            
          
            
        </div>
        
        
    </div>
</div>

<script src = "<?= JS_URL . "galerijaArtikel.js" ?>"></script>