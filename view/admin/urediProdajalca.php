
<?php
    
   if($vars!=NULL){
        $error = $vars["err"];
        $idProdajalca = $vars["idProdajalca"];
    } else{
        $idProdajalca = $_GET["idProdajalca"];
   }
 
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
        
            <div class ="titleProfil" align ="center" style ="padding-top: 0.4vh;">
                <h4 style ="font-weight: 600;">UREDI PRODAJALCA - ID: <?= $idProdajalca?></h4>
            </div>
            
            <div class ="profilVsebnik" style="padding: 7%; height: 70vh;">
            
                <form action = "<?= BASE_URL . "admin/prodajalec/uredi"?>" method = "POST">
                    <input type = "hidden" name = "idProdajalca" value = "<?=$idProdajalca ?>">
                    
                    <div class ="form-group ">
                            <label for = "gesloStranke">Sprememba gesla</label>
                            
                            <?php if($vars["error"] !=  NULL) :?>
                                <div class = "form-row">
                                    <h7 style ="color: red;" > <?=$vars["error"]?> </h7>
                                </div>
                                
                            <?php endif;?>
                            
                            <div class = "col-lg-5">
                                <input type = "password" class ="form-control" name = "trenutnoGeslo" id ="gesloStranke" placeholder = "Vpišite trenutno geslo">
                            </div>
                            
                        
                            
                            <div class = "col-lg-5" style ="margin-top: 1vh;">
                                <input type = "password" class = "form-control" name = "geslo" placeholder = "Vpišite novo geslo">
                            </div>

                            <button type = "submit" class ="btn my-4" style ="background-color: rgba(89,145,144,1); color: white; ">
                                Spremeni
                            </button>
                            

                    </div>

                

                </form>

                <form action = "" method = "POST">
                    Spremeni uporabniško ime:
                
                        <input type = "hidden" name = "idProdajalca" value = "<?= $idProdajalca ?>">
                            <div class = "col-lg-5">
                                <input type = "text" class = "form-control" name = "uporabniskoIme"  placeholder = "Vpišite novo uporabniško ime" >
                            </div>

                        <div class = "col-lg-2">
                            <button type = "submit" class ="btn my-4" style ="background-color: rgba(89,145,144,1); color: white; margin-top: 0px !important; ">
                                Spremeni
                            </button>
                        </div>
            
                </form>
            </div>
        </div>
    </div>       
</div>