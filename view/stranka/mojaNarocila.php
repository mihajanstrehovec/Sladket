
<?php
    require_once("model/eshopDB.php");
    // $ind = 0;
?>


<?php
// TESTING //
    #var_dump($imenaNarocil);
    #exit();
?>

<link rel ="stylesheet" href ="<?= CSS_URL . "narocilaProdajalec.css" ?>">

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
        
       
        
            <div class ="titleProfil" align ="center" style ="padding-top: 0.4vh;">
                <h4 style ="font-weight: 600;">NAROČILA</h4>
            </div>
    
            <div class ="overflow-auto profilVsebnik" style="padding: 7%;">

                <div class = "row justify-content-center">
                    <h5 style ="font-weight:600; color: rgb(240, 210, 157);">V ČAKALNI VRSTI</h5> 
                </div>

                <div class = "row ">
                    <div class = "col-lg-12 overflow-auto narocila">

                    <!-- NAROČILA V ČAKALNI VRSTI -->
                    <?php  foreach ($narocila as $narocilo): ?>
                       <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["potrjeno"] == 0 && $narocilo[$i]["preklicano"] == 0 ):?>
                                <h5><b>ID naročila:</b> <?= $narocilo[$i]["idNaročila"]?></h5>
                                <h6><b>IZDELKI: </b>
                                
                                <!-- Improt vseh Artiklov, ki so v naročilu -->
                                <?php 
                                    $id["idNarocila"] = $narocilo[$i]["idNaročila"];
                                    $Artikli = eshopDB::getNarociloArtikli($id); 
                                ?>
                                
                                <?php for($l = 0; $l < count($Artikli); $l++):?>
                                    <!-- Improt vseh informacij Artiklov, ki so v naročilu -->
                                    <?php 
                                        $id["idArtikla"]= $Artikli[$l]["idArtiklaForeign"];
                                        $Artikel = eshopDB::get($id);
                                    ?>

                                    <?= $Artikel["imeArtikla"] ?> (<?= $Artikli[$l]["kolicina"] ?>) 
                                    
                                    <?php endfor;?>
                                    
                                    <h6><b>Končna cena:</b> <?= $narocilo[$i]["total"] ?> </h6> 
                                    
                                   
                
                                    <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                            <?php endif;?>
                        <?php endfor;?>
                    <?php endforeach;?>
                </div>
            </div>




            <div class = "row justify-content-center" style = "margin-top: 5vh;">
                <h5 class = "text-success" style ="font-weight:600; color: rgba(89,145,144,1);">POTRJENA NAROČILA</h6> 
            </div>

            <div class = "row">
                <div class = "col-lg-12 overflow-auto narocila narocilaPotrjena">

                    <!-- NAROČILA POTRJENA -->
                    <?php  foreach ($narocila as $narocilo): ?>
                        <?php for($i = 0; $i < count($narocilo); $i++):?>
                                <?php if($narocilo[$i]["potrjeno"] == 1):?>
                                
                                    <h5><b>ID naročila:</b> <?= $narocilo[$i]["idNaročila"]?></h5>
                                    <h6><b>IZDELKI: </b>

                                    <!-- Improt vseh Artiklov, ki so v naročilu -->
                                    <?php 
                                        $id["idNarocila"] = $narocilo[$i]["idNaročila"];
                                        $Artikli = eshopDB::getNarociloArtikli($id);  
                                    ?>

                                    <!-- Improt vseh informacij Artiklov, ki so v naročilu -->
                                    <?php for($l = 0; $l < count($Artikli); $l++):?>
                                        <?php 
                                            $id["idArtikla"]= $Artikli[$l]["idArtiklaForeign"];
                                            $Artikel = eshopDB::get($id);
                                        ?>
                                        
                                        <?= $Artikel["imeArtikla"] ?> (<?= $Artikli[$l]["kolicina"] ?>) 
                                        
                                    <?php endfor;?>
                                    
                                    <h6><b>Končna cena:</b> <?= $narocilo[$i]["total"] ?> </h6>

                                    <!-- Form za storniranje potrjenih naročil -->
                                    <form action = "" method = "POST">
                                        <input type = "hidden" name = "idNarocila" value = "<?= $narocilo[$i]["idNaročila"]?>">
                                        <input type = "hidden" name = "ukaz" value = "storniraj">
                                        <button type="submit" class ="btn " style = "margin-left: 3vw; background-color: rgba(41, 43, 44, 0.5); color: white;">Storniraj</button>
                                    </form> 
                                    
                                    <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                                
                                <?php endif;?>
                        <?php endfor;?>
                    <?php endforeach;?>
                </div>
            </div>






            <div class = "row justify-content-center" style = "margin-top: 5vh; ">
                <h5 class = "text-danger" style ="font-weight:600; color: rgba(89,145,144,1);">ZAVRNJENA NAROČILA</h5> 
            </div>
            
            <div class = "row">
                <div class = "col-lg-12 overflow-auto narocila narocilaZavrnjena">
                    <!-- NAROČILA ZAVRNJENA -->
                    <?php  foreach ($narocila as $narocilo): ?>
                    <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["preklicano"] == 1):?>
                                <h5><b>ID naročila:</b> <?= $narocilo[$i]["idNaročila"]?></h5>
                                <h6><b>IZDELKI: </b>
                                
                                <!-- Improt vseh Artiklov, ki so v naročilu -->
                                <?php 
                                    $id["idNarocila"] = $narocilo[$i]["idNaročila"];
                                    $Artikli = eshopDB::getNarociloArtikli($id);                                 
                                ?>
                                
                                <!-- Improt vseh informacij Artiklov, ki so v naročilu -->
                                <?php for($l = 0; $l < count($Artikli); $l++):?>
                                    <?php 
                                        $id["idArtikla"]= $Artikli[$l]["idArtiklaForeign"];
                                        $Artikel = eshopDB::get($id);
                                    ?>
                                    
                                    <?= $Artikel["imeArtikla"] ?> (<?= $Artikli[$l]["kolicina"] ?>) 
                                    
                                <?php endfor;?>
                                
                                <h6><b>Končna cena:</b> <?= $narocilo[$i]["total"] ?> </h6> 
                                
                                <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                            <?php endif;?>
                        <?php endfor;?>
                    <?php endforeach;?>
                </div>
            </div>

            
            <div class = "row justify-content-center" style = "margin-top: 5vh; ">
                <h5  style ="font-weight:600; color: rgba(41, 43, 44, 1);">STORNIRANA NAROČILA</h5> 
            </div>
            
            <div class = "row">
                <div class = "col-lg-12 overflow-auto narocila narocilaStornirana">
                    <!-- NAROČILA STORNIRANA -->
                    <?php  foreach ($narocila as $narocilo): ?>
                    <?php for($i = 0; $i < count($narocilo); $i++):?>
                            <?php if($narocilo[$i]["stornirano"] == 1):?>
                                <h5><b>ID naročila:</b> <?= $narocilo[$i]["idNaročila"]?></h5>
                                <h6><b>IZDELKI: </b>
                                
                                <!-- Improt vseh Artiklov, ki so v naročilu -->
                                <?php 
                                    $id["idNarocila"] = $narocilo[$i]["idNaročila"];
                                    $Artikli = eshopDB::getNarociloArtikli($id);                                 
                                ?>
                                
                                <!-- Improt vseh informacij Artiklov, ki so v naročilu -->
                                <?php for($l = 0; $l < count($Artikli); $l++):?>
                                    <?php 
                                        $id["idArtikla"]= $Artikli[$l]["idArtiklaForeign"];
                                        $Artikel = eshopDB::get($id);
                                    ?>
                                    
                                    <?= $Artikel["imeArtikla"] ?> (<?= $Artikli[$l]["kolicina"] ?>) 
                                    
                                <?php endfor;?>
                                
                                <h6><b>Končna cena:</b> <?= $narocilo[$i]["total"] ?> </h6> 
                                
                                <hr class="mt-2 mb-3" style ="border-top: 1.6px solid rgba(0,0,0,.55)"/>
                            <?php endif;?>
                        <?php endfor;?>
                    <?php endforeach;?>
                </div>
            </div>




               
        
            </div>

        </div>
    </div>
        
</div>