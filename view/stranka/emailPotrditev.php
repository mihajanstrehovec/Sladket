<?php

#var_dump($data);

?>



<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" align ="center">
            
        
            <div class = col-lg-6>
                <div class ="titleRegister" align ="center" style ="padding-top: 0.4vh; margin-top: 10vh;">
                    <h4 style ="font-weight: 600;">POTRDITVENA KODA</h4>
                </div>
            
                <div class ="registerVsebnik" style="padding: 60px;">

                    <form action = "<?= BASE_URL . "uporabnik/registracija"?>" method = "POST">
                        
                        Na vaš email račun <i><?= $data["mailStranke"]?></i> smo vam poslali potrditveno kodo, ki jo sedaj lahko vnesete spodaj.

                        <p style = "color: red;"> <?= $err?> </p>
                    
                        <input type = "hidden" name = "imeStranke" value = "<?= $data["imeStranke"]?>" class = "form-control">
                    
                    
                        <input type = "hidden" name = "priimekStranke" value = "<?= $data["priimekStranke"]?>" class = "form-control">
                
                        <input type = "hidden" name = "mailStranke" value = "<?= $data["mailStranke"]?>" class = "form-control">
                    
                
                        <input type = "hidden" name = "gesloStranke" value = "<?= $data["gesloStranke"]?>" class = "form-control">
                        
                        <input type = "hidden" name = "potrditvenaKoda" value = "<?= $data["potrditvenaKoda"]?>" class = "form-control">


                        
                        <input type = "text" name = "vnesenaPotrditvenaKoda" placeholder = "potrditvena koda" class = "form-control">
                    
                
                       
            
            
                        <input type = "hidden" name = "ulica" value = "<?= $data["ulica"]?>" class = "form-control">
                    
                
                        <input type = "hidden" name = "hisnaSt" value = "<?= $data["hisnaSt"]?>" class = "form-control">
        
            
                        <input type = "hidden" name = "posta" value = "<?= $data["posta"]?>" class = "form-control">
                    
        
                        <input type = "hidden" name = "postnaSt" value = "<?= $data["postnaSt"]?>" class = "form-control">
                 

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

