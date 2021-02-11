
<?php


    #var_dump($Stranke);
    #exit();
    
   
    $ind = 0;
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
        
            <div class ="titleProfil" align ="center" style ="padding: 0.4vh; ">
                <h4 style ="font-weight: 600;">PRODAJALCI</h4>
            </div>
    
            <div class ="overflow-auto profilVsebnik" style="padding: 7%; height: 70vh;">
                <!-- Ločilna črta -->
                <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                
                <!-- For zanka, ki gre čez vse prodajalce -->
                <?php foreach ($Prodajalci as $prodajalec): ?>

                    <h5><b>ID: <?=  $prodajalec["idProdajalca"] ?></h5></b>
                    
                    <div class = "row">
                        <b class = "atribute">Uporabniško ime: </b>  <?=  $prodajalec["uporabniskoIme"] ?>
                    </div>
                    
                    <div class = "row">
                        <b class = "atribute">Email:</b>  <?= $prodajalec["eMail"] ?> 
                    </div>

                    <div class = "row">

                        <!-- Gumb z apovezavo do urejanaj prodajalca -->
                        <a href = "<?= BASE_URL . "admin/prodajalec/uredi?idProdajalca=".   $prodajalec["idProdajalca"] ?>">
                            <button type = "submit" class = "btn btn-info" style ="width: 8vw; margin-left: 20%; margin-top: 3vh; height: 4vh;"> Uredi prodajalca </button>
                        </a>
                        
                        <!-- Deaktivacija in aktivacija prodajalca (mehki izbris, vrednost ser nastavi na 0 ali 1 in na podlagi tega se potem prodajalec lahko ali ne more prijavtit) -->
                        <?php if($prodajalec["aktiviran"] == 1): ?>
                            <form action = "" method = "POST">
                                <input type ="hidden" value = "<?= $prodajalec["idProdajalca"]?>" name = "idProdajalca">
                                <input type ="hidden" value = "deaktiviraj" name = "ukaz">
                                <button type="submit" class ="btn btn-danger" style = "margin-left: 40%; margin-top: 3vh;">Deaktiviraj</button>
                            </form>
                        <?php else: ?>
                            <form action = "" method = "POST">
                                <input type ="hidden" value = "<?= $prodajalec["idProdajalca"]?>" name = "idProdajalca">
                                <input type ="hidden" value = "aktiviraj" name = "ukaz">
                                <button type="submit" class ="btn btn-success" style = "margin-left: 40%; margin-top: 3vh;">Aktiviraj</button>
                            </form>
                        <?php endif; ?>
                    
                    </div>

                    <!-- Ločilna črta -->
                    <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>

                <?php endforeach; ?>
            </div>
        </div>
    </div>      
</div>