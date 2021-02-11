
<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" align ="center">
            
        
            <div class = col-lg-6>
                <div class ="titleRegister" align ="center" style ="padding-top: 0.4vh;">
                    <h4 style ="font-weight: 600;">VPIS</h4>
                </div>
            
                <div class ="registerVsebnik" style="padding-top: 3vh;">

                <form action = "<?= BASE_URL . "admin/prijava"?>" method = "POST">
                    
                    <!-- Error messages -->
                    <?php if($err ==  "Email naslov in geslo se ne ujemata") :?>
                            <div class = "form-row justify-content-center">
                                <h7 style ="color: red;" > <?= $err ?> </h7>
                            </div>
                    <?php endif;?>
                   

                    
                    <!-- Email admina -->
                    <div class = "form-row justify-content-center">
                        
                        <div class ="col-lg-7">
                            <input type = "text" name = "eMail" placeholder = "elektronska pošta" class = "form-control">
                        </div>
        
                    </div>
                    
                    <!-- Geslo -->
                    <div class = "form-row justify-content-center" style = "margin-top: 3vh;">
                        
                        <div class ="col-lg-7">
                            <input type = "password" name = "geslo" placeholder = "Geslo" class = "form-control">
                        </div>
        
                    </div>


                    <!-- Submit -->
                    <div class = "form-row justify-content-center">
                        
                        <div class = "col-lg-6" allign ="center">
                            <button type = "submit" class = "btn my-4 btn-block waves-effect waves-light" 
                            style = "margin-top: 3vh; background-color: rgba(89,145,144,1); color: white;">PRIJAVA</button>
                        </div>

                    </div>
                
                </form> 
                    
            </div>
        </div>  
    </div>
</div>

 
       