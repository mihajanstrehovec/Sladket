
<?php
    #var_dump($_SESSION);
    #exit();
?>

<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" >
    
            <div class ="titleProfil" align ="center" style ="padding-top: 0.4vh;">
                <h4 style ="font-weight: 600;">PROFIL</h4>
            </div>
    
            <div class ="profilVsebnik" style="padding: 7%; height: 70vh;">
            
                <!-- Form za spreminjanje gesla -->
                <form action = "" method = "POST">
                Sprememba gesla:
                
                    <div class ="form-group ">
                            
                            <?php if($err ==  "Vnešeno geslo je napačno") :?>
                                <div class = "form-row">
                                    <h7 style ="color: red;" > <?= $err ?> </h7>
                                </div>
                            <?php endif;?>
                            
                            <div class = "col-lg-5">
                                <input type = "password" class ="form-control" name = "trenutnoGeslo" id ="gesloStranke" placeholder = "Vpišite trenutno geslo">
                            </div>
                            
                            <div class = "col-lg-5" style ="margin-top: 1vh;">
                                <input type = "password" class = "form-control" name = "geslo" placeholder = "Vpišite novo geslo">
                            </div>

                            <button type = "submit" class ="btn my-4" style ="background-color: rgba(89,145,144,1); color: white; margin-top: 10px!important; margin-left:16px!important;">
                                Spremeni
                            </button>  

                    </div>

                </form>
                
                <!-- Form za spreminjanje uporabniškega imena -->
                <form action = "" method = "POST">

                        Sprememba uporabniškega imena:
                        <div class = "col-lg-5">
                            <input type = "text" class = "form-control" name = "uporabniskoIme"  placeholder = "Vpišite novo uporabniško ime" >
                        </div>

                        <div class = "col-lg-2">

                        <button type = "submit" class ="btn my-4" style ="background-color: rgba(89,145,144,1); color: white; margin-top: 10px !important; ">
                            Spremeni
                        </button>

                        </div>
                </form>
                
            </div>
        </div>
    </div>    
</div>