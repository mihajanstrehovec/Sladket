
<div class ="container">
    <div class ="row no-gutters justify-content-center">
        <div class ="col-lg-10" align ="center">
        
            <div class = col-lg-6>
                
                <div class ="titleRegister" align ="center" style ="padding-top: 0.4vh; margin-top: 20vh;">
                    <h4 style ="font-weight: 600;">SPREMENI GESLO</h4>
                </div>
            
                <div class ="registerVsebnik" style="padding-top: 3vh;">

                    <form action = "<?= BASE_URL . "admin/spremeni-geslo"?>" method = "POST">
                        
                        <!-- Napačno trenutno geslo -->
                        <?php if($err ==  "Vpisano trenutno geslo je napačno") :?>
                                <div class = "form-row form-row justify-content-center">
                                    <h7 style ="color: red;"> <?= $err ?> </h7>
                                </div>
                        <?php endif;?>

                        
                        <!-- Trenutno geslo -->
                        <div class = "form-row justify-content-center">
                            
                            <div class ="col-lg-7">
                                <input type = "password" name = "trenutnoGeslo" placeholder = "Trenutno geslo"  class = "form-control">
                            </div>
            
                        </div>
                        
                        <!-- Novo geslo -->
                        <div class = "form-row justify-content-center" style = "margin-top: 3vh;">
                            
                            <div class ="col-lg-7">
                                <input type = "password" name = "geslo" placeholder = "Novo geslo" class = "form-control">
                            </div>
            
                        </div>


                        <!-- Potrdi -->
                        <div class = "form-row justify-content-center">
                            <div class = "col-lg-6" allign ="center">
                                <button type = "submit" class = "btn my-4 btn-block waves-effect waves-light" 
                                style = "margin-top: 3vh; background-color: rgba(89,145,144,1); color: white;">POSODOBI</button>
                            </div>
                        </div>
                    
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
        
       