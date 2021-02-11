
<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" align ="center">
            
        
            <div class = col-lg-6>
                <div class ="titleRegister" align ="center" style ="padding-top: 0.4vh; margin-top: 10vh;">
                    <h4 style ="font-weight: 600;">REGISTRACIJA</h4>
                </div>
            
                <div class ="registerVsebnik" style="padding: 60px;">

                    <form action = "<?= BASE_URL . "uporabnik/registracija/potrditvenaKoda"?>" method = "POST">
                        
                        <!-- V primeru napačne captche -->
                        <?php if($err ==  "Vnesite pravilno Captcho") :?>
                                <div class = "form-row">
                                    <h7 style ="color: red;"> <?= $err ?> </h7>
                                </div>
                        <?php endif;?>
                        
                        <!-- ime in priimek -->
                        <div class = "form-row">
                            
                            <div class ="col">
                                <input type = "text" name = "imeStranke" placeholder = "Ime" class = "form-control">
                            </div>

                            <div class ="col">
                                <input type = "text" name = "priimekStranke" placeholder = "Priimek" class = "form-control">
                            </div>
                        </div>

                        <!-- V primeru napačnega formata email (ni @ in .si itd.) -->
                        <?php if($err ==  "Prosimo vnesite validen e-mail") :?>
                                <div class = "form-row">
                                    <h7 style ="color: red;"> <?= $err ?> </h7>
                                </div>
                        <?php endif;?>
                        
                        <!-- Mail -->
                        <div class = "form-row">
                        
                            <div class ="col">
                                <input type = "text" name = "mailStranke" placeholder = "E-pošta" class = "form-control">
                            </div>
            
                        </div>
                        
                        <!-- Geslo -->
                        <div class = "form-row" style = "margin-top: 3vh;">
                    
                            <div class ="col">
                                <input type = "password" name = "gesloStranke" placeholder = "Geslo" class = "form-control">
                            </div>
            
                        </div>

                        <!-- V primeru, da se vnepšeni gesli ne ujemata -->
                        <?php if($err ==  "Gesli se ne ujemata") :?>
                                <div class = "form-row">
                                    <h7 style ="color: red;"> <?= $err ?> </h7>
                                </div>
                        <?php endif;?>

                        <!-- Ponovitev gesla -->
                        <div class = "form-row">
                            
                            <div class ="col">
                                <input type = "password" name = "gesloPonovi" placeholder = "Ponovite geslo" class = "form-control"
                                style = "margin-bottom: 1vh;">
                            </div>

                        </div>

                        <!-- Poštni naslov -->
                        Naslov 
                        <div class = "form-row">
                            <div class ="col-lg-9">
                                <input type = "text" name = "ulica" placeholder = "Ulica" class = "form-control">
                            </div>

                            <div class ="col-lg-3">
                                <input type = "number" name = "hisnaSt" placeholder = "Št" class = "form-control">
                            </div>
                        </div>

                        <div class = "form-row">
                            <div class ="col-lg-9">
                                <input type = "text" name = "posta" placeholder = "Pošta" class = "form-control">
                            </div>

                            <div class ="col-lg-3">
                                <input type = "number" name = "postnaSt" placeholder = "Št" class = "form-control">
                            </div>
                        </div>
                        
                        <!-- CAPTCHA -->
                        <!-- HARD KODIRANO NA NAŠ NASLOV; OB SPREMEMEMBI DIREKTIORIJEV NUJNO POSODOBI LINK -->
                        <img src="<?= BASE_FILE ?>view/stranka/captcha.php" class = "captcha">
                        <input type="text" placeholder = "Vnesite captcho" name="captcha"class = "captcha">

                        <div class = "form-row justify-content-center">
                            <div class = "col-lg-6" allign ="center">
                                <button type = "submit" class = "btn my-4 btn-block waves-effect waves-light" 
                                style = "margin-top: 3vh; background-color: rgba(89,145,144,1); color: white;">REGISTRACIJA</button>
                            </div>
                        </div>
                    </form>       
                </div>
            </div>   
        </div>
    </div>
</div>
