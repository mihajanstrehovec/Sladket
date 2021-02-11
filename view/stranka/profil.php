
<?php
    #var_dump($_SESSION);
    #var_dump($Stranka);
    #exit();
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
        
       
        
            <div class ="titleProfil" align ="center" style ="padding-top: 0.4vh;">
                <h4 style ="font-weight: 600;">PROFIL</h4>
            </div>
    
            <div class ="profilVsebnik overflow-auto" style="padding: 7%; height: 75vh;">
            
                <p style ="color: red"><?= $Stranka["err1"]?></p>
                <!-- FORM zamenjava gesla -->
                <form action = "<?= BASE_URL . "profil" ?>" method = "POST">
                
                Sprememba gesla
                <div class ="form-group ">
                       
                       
                        <?php if($err ==  "Vnešeno geslo je napačno") :?>
                            <div class = "form-row">
                                <h7 style ="color: red;" > <?= $err ?> </h7>
                            </div>
                        <?php endif;?>

                        <div class = "form-row">
                            <div class = "col-lg-5" style = "padding:0px;">

                                <input type = "password" class ="form-control" name = "trenutnoGeslo" id ="gesloStranke" placeholder = "Vpišite trenutno geslo" style = "margin-left: 0px;important">
                            </div>
                        </div>
                       
                        <div class = "form-row">
                            <div class = "col-lg-5" style ="margin-top: 1vh; padding:0px;">
                                <input type = "password" class = "form-control" name = "gesloStranke" placeholder = "Vpišite novo geslo">
                            </div>
                        </div>
                        
                        <button type = "submit" class ="btn my-4" style ="background-color: rgba(89,145,144,1); color: white; ">
                            Spremeni
                        </button>
                        

                </div>

                

                </form>

                            
                <!-- FORM zamenjava emaila -->
                Posodobitev e-maila
                <form action = "<?= BASE_URL . "profil" ?>" method = "POST">
                    <div class = "form-row">
                        <div class = "col-lg-5">
                            <input type = "text" class = "form-control" name = "mailStranke"  placeholder = "Trenutni: <?= $_SESSION["mailStranke"]?>" >
                        </div>
                    </div>


                    <div class = "form-row">
                        <div class = "col-lg-2">
                            <button type = "submit" class ="btn my-4" 
                            style ="background-color: rgba(89,145,144,1); color: white; ">
                            Spremeni</button>
                        </div>
                    </div>
                

                </form>


                <!-- FORM posodobitev naslova -->
                Posodobitev naslova
                <p style ="color: red"><?= $Stranka["err"]?></p>
                <form action = "<?= BASE_URL . "profil/posodobiNaslov" ?>" method = "POST">
                        
                            <div class = "form-row">
                                <div class ="col-lg-5">
                                    
                                    <input type = "text" name = "ulica" placeholder = "Ulica: <?= $Stranka[0]["ulica"]?>" class = "form-control">
                                </div>
                                <div class ="col-lg-2">
                                    <input type = "number" name = "hisnaSt" placeholder = "Št: <?= $Stranka[0]["hisnaSt"]?>" class = "form-control">
                                </div>
                            </div>

                            <div class = "form-row">
                                <div class ="col-lg-5">
                                    
                                    <input type = "text" name = "posta" placeholder = "Pošta: <?= $Stranka[0]["posta"]?>" class = "form-control">
                                </div>
                                <div class ="col-lg-2">
                                    <input type = "number" name = "postnaSt" placeholder = "Št: <?= $Stranka[0]["postnaSt"]?>" class = "form-control">
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