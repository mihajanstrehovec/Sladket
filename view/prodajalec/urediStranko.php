
<?php
// TESTING //
#var_dump($data);
#exit();
if($_GET["idStranke"] == null){
    $strankaID = $data["idStranke"];
    
} else {
    $strankaID = $_GET["idStranke"];
}
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
        
       
        
            <div class ="titleProfil" align ="center" style ="padding-top: 0.4vh;">
                <h4 style ="font-weight: 600;">UREDI STRANKO - ID:  <?= $strankaID?> </h4>
            </div>
    
            <div class ="profilVsebnik overflow-auto" style="padding: 7%; height: 70vh">
            
                <!-- FORM za posodobitev poštnega naslova -->
                Posodobitev Poštnega naslova
                <p style = "color: red;"> <?= $data["err"]?> </p>
                <form action = "<?= BASE_URL . "prodajalec/urediStranko" ?>" method = "POST">
                    
                <input type = "hidden" name = "idStranke" value ="<?= $strankaID?>" class = "form-control">
                        <div class = "form-row">
                            
                            <div class ="col-lg-5">
                                <input type = "text" name = "ulica" placeholder = "Ulica" class = "form-control">
                            </div>

                            <div class ="col-lg-2">
                                <input type = "number" name = "hisnaSt" placeholder = "Št" class = "form-control">
                            </div>
                        
                        </div>
                        
                        <div class = "form-row">
                        
                        <div class ="col-lg-5">
                                <input type = "text" name = "posta" placeholder = "Pošta" class = "form-control">
                            </div>
                            
                            <div class ="col-lg-2">
                                <input type = "number" name = "postnaSt" placeholder = "Št" class = "form-control">
                            </div>
                        
                        </div>
                        
                        <div class = "form-row ">
                            <div class = "col-lg-2" allign ="center">
                                <button type = "submit" class = "btn my-4 btn-block waves-effect waves-light" 
                                style = "margin-top: 3vh; background-color: rgba(89,145,144,1); color: white;">SPREMENI</button>
                            </div>
                        </div>
                
                </form>
            </div>
        </div>
    </div>
</div>