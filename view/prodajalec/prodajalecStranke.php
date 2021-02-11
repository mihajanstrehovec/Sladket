
<?php
// TESTIRANJE //
    #var_dump($Stranke);
    #exit();
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
            
            <div class ="titleProfil" align ="center" style ="padding: 0.4vh;">
                <h4 style ="font-weight: 600;">STRANKE</h4>
            </div>
    
            <div class ="overflow-auto profilVsebnik" style="padding: 7%; height: 70vh;">

                <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>

                <!-- For zanka, ki gre čey array $Stranke -->
                <?php foreach ($Stranke as $stranka): ?>
                    
                    <h5><b>ID: <?=  $stranka["idStranke"] ?></h5></b>
                    
                    <div class = "row">
                        <b class = "atribute">Ime: </b>  <?=  $stranka["imeStranke"] ?>
                    </div>
                    
                    <div class = "row">
                        <b class = "atribute">Priimek:</b>  <?= $stranka["priimekStranke"] ?> 
                    </div>
                    
                    <div class = "row">
                        <b class = "atribute">Naslov:</b>  <?= $stranka["ulica"] ?> <?= $stranka["hisnaSt"] ?>,  <?= $stranka["posta"] ?> <?= $stranka["postnaSt"] ?>
                    </div>
                    
                    <a href = "<?= BASE_URL . "prodajalec/urediStranko?idStranke=".   $stranka["idStranke"] ?>">
                        <button type = "submit" class = "btn btn-info" style ="width: 8vw; margin-left: 10%; margin-top: 3vh; height: 4vh;"> Uredi stranko </button>
                    </a>
                    
                    <!-- Aktiviranje in deaktiviranje stranke -->
                    <?php if($stranka["aktivirana"] == 1): ?>
                        <form action = "" method = "POST">
                            <input type ="hidden" value = "<?= $stranka["idStranke"]?>" name = "idStranke">
                            <input type ="hidden" value = "deaktiviraj" name = "ukaz">
                            <button type="submit" class ="btn btn-danger" style = "margin-left: 10%; margin-top: 3vh;">Deaktiviraj</button>
                        </form>
                    <?php else: ?>
                        <form action = "" method = "POST">
                            <input type ="hidden" value = "<?= $stranka["idStranke"]?>" name = "idStranke">
                            <input type ="hidden" value = "aktiviraj" name = "ukaz">
                            <button type="submit" class ="btn btn-success" style = "margin-left: 10%; margin-top: 3vh;">Aktiviraj</button>
                        </form>
                    <?php endif; ?>
                    <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>

                <?php endforeach; ?>
            </div>
        </div>
    </div>  
</div>