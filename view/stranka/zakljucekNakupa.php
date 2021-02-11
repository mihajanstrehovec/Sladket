<?php
#var_dump($_SESSION);
$total = floatval($_SESSION['total']);
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
        
       
        
            <div class ="titleProfil" align ="center" style ="padding-top: 0.4vh;">
                <h4 style ="font-weight: 600;">PREGLED NAROCILA</h4>
            </div>
    
            <div class ="profilVsebnik" style="padding: 7%; height: 70vh">
                <div class ="overflow-auto narocilo">
                    
                <?php foreach ($Narocilo as $Artikel): ?>
                        <div class = "row izdelek"  >
                            <?php   $imeSlike = eshopDB::getImages($Artikel);?>

                            <img id ="artikelSlika" src = "<?= IMAGES_URL . "/products/". $imeSlike[0]["imeSlike"]?>" height = "50px">
                            <h5><b><?= $Artikel["imeArtikla"]?></b></h5>
                            
                            <h5>Količina: <?php echo($_SESSION['cart'][$Artikel['idArtikla']])?> </h5>
                            <h5>Cena: <?php echo($Artikel['cenaArtikla'])?>€ </h5>
                        
                        </div>
                <?php endforeach?>
                    
                </div>
                
                <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                
                <h5>
                    <b>Skupaj: <?php echo($_SESSION["total"]) ?>€</b>
                    
                    <div class = "row justify-content-center">
                    
                        <form action = "<?php BASE_URL . "zakljucekNakupa"?>" method ="POST">
                            <button type = "submit" class = "btn my-4" style = "background-color: rgba(89,145,144,1); color: white; margin-top: 5vh;">Oddaj naročilo</button>
                        </form>
                    
                    </div>

                </h5>
            </div>
        </div>
    </div>   
</div>