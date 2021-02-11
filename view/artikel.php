
<?php 
//TESTING//

#var_dump($Artikel["Images"]);
#var_dump($_SESSION);

#exit();
?>

<!-- PODATKI -->
<!-- Importani preko eshopDB::getArtikel funkcije, ki vrne vse informacije v obliki Arraya -->


<link rel ="stylesheet" href ="<?= CSS_URL . "galerijaArtikel.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "artikelStyle.css" ?>">

 
        
<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
        
        <!-- Ime artikla -->
        <div class ="titleArtikel" align ="center" style ="padding-top: 0.4vh;">
            <h4 style ="font-weight: 600;"><?= $Artikel["imeArtikla"]?></h4>
        </div>
        


        <div class ="artikelVsebnik" >
            
            
            <div id ="opisIzdelka">
               <div id ="oArtiklu">O ARTIKLU</div>
               <div class ="overflow-auto" id="besediloOpisa">
               <?= $Artikel["opisArtikla"]?>
               </div>
            </div>
            
            <div id ="desno">
                <div class ="row no-gutters ">

                <div class="slideshow-container">
                     <!-- Galerija slik -->
                    <div class="slideshow-container">

                        <!--For loop, ki prikazuje vse slike artikla-->
                        <?php for($i = 0; $i < count($Artikel["Images"]); $i++):?>
                            <div class="mySlides fade">
                                <div class="trenutnaSlika">1 / 3</div>
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

                        
                <div class ="row no-gutters justify-content-center nakup">
                  <s style = "margin-right: 5px; color: rgb(240, 210, 157)!important;"><?= $Artikel["cenaArtikla"] + rand(0, 30)?></s><?= $Artikel["cenaArtikla"]?>
                </div>
                <?php 
                
                if($Artikel["steviloOcen"] == 0){
                    
                    $ocena = 0;
                }
                
                else{
                    
                    $ocena = $Artikel["ocena"] / $Artikel["steviloOcen"];

                }
                
                for($i = 1; $i < 6;$i++){ 
                    
                    if($i <= $ocena){    ?>
                    
                      <button style="background-color:rgba(0,0,0,0);border:0px " id=<?="$i"?>><img id=<?="zvezdica$i"?> style="width:2em" src="<?= IMAGES_URL . "star.png"?>"></button> 
                        
                <?php
                    
                    }
                    
                    else if($i > $ocena){ ?>

                        <button style="background-color:rgba(0,0,0,0);border:0px " id=<?="$i"?>><img id=<?="zvezdica$i"?> style="width:2em" src="<?= IMAGES_URL . "gray-star.png"?>"></button> 
                
                <?php    
                    
                    } 
                      
                      } ?>
                <!-- Se izpiše ko je prijavljena stranka -->
                <?php if($_SESSION["tipUporabnika"] == "stranka"): ?> 
                    <div class ="row no-gutters justify-content-center dodVkos">
                        <!-- Form za dodajanje artikla v košarico -->
                        <form action ="" method = "POST">
                            
                            <input type="hidden" name="do" value="add_into_cart" />    
                            <input type = "hidden" name = "idArtikla" value = "<?= $Artikel["idArtikla"]?>">
                            <input type = "hidden" name = "imeArtikla" value = "<?= $Artikel["imeArtikla"]?>">
                            <input type = "hidden" name = "cenaArtikla" value = "<?= $Artikel["cenaArtikla"]?>">    
            
                            <button type="submit" class="btn btn-light dodajVKos">Dodaj v kosarico</button>
                  
                        </form>
                    </div>

                
                <!-- OCENJEVANJE ARTIKLA -->
                <form action="storeOcena" method = "POST" id="ocenaForm">
                <input type="hidden" name="submitOcena" value="" id = "submitOcenaID"/>
                <input type = "hidden" name = "idArtikla" value = "<?= $Artikel["idArtikla"]?>">
                <input type = "hidden" name = "ocena" value = "<?= $Artikel["ocena"]?>">
                <input type = "hidden" name = "steviloOcen" value = "<?= $Artikel["steviloOcen"]?>">    
                </form>
                <?php 
                
                if($Artikel["steviloOcen"] == 0){
                    
                    $ocena = 0;
                }
                
                else{
                    
                    $ocena = $Artikel["ocena"] / $Artikel["steviloOcen"];

                }
                
                for($i = 1; $i < 6;$i++){ 
                    
                    if($i <= $ocena){    ?>
                    
                      <button style="background-color:rgba(0,0,0,0);border:0px " id=<?="$i"?> onclick="dodajOceno(this.id)"><img id=<?="zvezdica$i"?> style="width:2em" src="<?= IMAGES_URL . "star.png"?>"></button> 
                        
                <?php
                    
                    }
                    
                    else if($i > $ocena){ ?>

                        <button style="background-color:rgba(0,0,0,0);border:0px " id=<?="$i"?> onclick="dodajOceno(this.id)"><img id=<?="zvezdica$i"?> style="width:2em" src="<?= IMAGES_URL . "gray-star.png"?>"></button> 
                
                <?php    
                    
                    } 
                      
                      } ?>
                
                
                
                


                <?php endif; ?>
                
                <!-- Se prikaže če je  prijavljen prodajalec -->
                <?php if($_SESSION["tipUporabnika"] == "prodajalec") :?>
                    <div class ="row no-gutters justify-content-center dodVkos">
                        <a href ="<?= BASE_URL . "artikel/uredi?idArtikla=" . $Artikel["idArtikla"]?>"> 
                          <button type="button" class="btn btn-light dodajVKos">Uredi artikel</button>
                        </a>
                    </div> 
                <?php endif ?>  
            
        </div>
       
    </div>
</div>


<script src = "<?= JS_URL . "galerijaArtikel.js" ?>"></script>
<script src="jquery-3.5.1.min.js"></script>
<script>
    function dodajOceno(id){
    
        if (1 == 1){
            document.getElementById("submitOcenaID").setAttribute("value",id);
        }        
        $("#ocenaForm").submit();            
    
    }
</script>
    
    
</script>



