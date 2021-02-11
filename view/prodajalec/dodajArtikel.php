<link rel ="stylesheet" href ="<?= CSS_URL . "artikelStyle.css" ?>">

<div class ="row no-gutters justify-content-center">
    <div class ="col-lg-10" align ="center">
    
        <div class ="dodajArtikel" align ="center" style ="padding-top: 0.4vh; margin-top: 6vh!important;">
            <h4 style ="font-weight: 600;">DODAJ ARTIKEL</h4>
        </div>
    
        <div class ="artikelVsebnik" style="padding: 60px; height: 70vh;">
                
            <form action ="<?= BASE_URL . "artikel/dodaj" ?>" method = "POST" enctype="multipart/form-data">
                
                <!-- Ime artikla, opis artikla in kategorija aritkla -->
                <div class="form-row" >
                    
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name ="imeArtikla"placeholder="Ime artikla" style="float: left; width: 50%; ">
                    </div>
                    
                    <div class="col-lg-12">
                        <textarea placeholder="Opis artikla"   class="form-control" id="exampleFormControlTextarea1" rows="7" name ="opisArtikla" style ="width: 70%; float: left; margin-top: 20px;"></textarea>
                    </div>
                
                    <div class="col-lg-12">
                        <select class="form-control" id="exampleFormControlSelect1" name ="kategorijaArtikla"style ="width: 35%; float: left; margin-top: 20px;">
                            <option hidden> Kategorija</option>
                            <option>Kornet</option>
                            <option>Na žlico</option>
                            <option>Kepca</option>
                            <option>Piškotek</option>
                        </select>
                    </div>

                </div>
            

                <!-- Dodajanje slike -->
                <div class = "form-group row" style = "margin: 20px 0px 0px 1px;">
                    <b style ="color: rgb(240, 210, 157); font-weight: 600;"> DODAJ SLIKE:</b> <input type="file" name="file[]" id="file" multiple style = "margin-left: 20px;">  
                </div>
        
            
            
                <!-- Cena -->
                <div class="form-group row">
                    <label for="example-number-input" class ="col-1" style ="margin-top: 24px; color: rgb(240, 210, 157); font-weight: 600;">CENA</label>
                    <input class="form-control" type="number" name="cenaArtikla" value="7" id="example-number-input" style ="width: 10%; flaot: left; margin-top: 20px;">
                </div>
                

                <!-- Zaloga -->
                <div class="form-group row">
                    <label for="example-number-input" class ="col-1" style ="margin-top: 24px; color: rgb(240, 210, 157); font-weight: 600; float: left; margin-right: 10px;">ZALOGA</label>
                    <input class="form-control" type="number" name="zalogaArtikla" value="15" id="example-number-input" style ="width: 10%; float: left; margin-top: 20px;">
                </div>   
            
        
                <button type="submit" name="submit" class="btn btn-light dodajVKos" style = "margin-top: 0  vh; background-color: rgba(89,145,144,0.7); color: white;">Ustvari izdelek</button>
                
            </form>   
            
        </div> 
    </div>   
</div>

        
        
        
<script>
    $(document).ready(function() {
    $('#global-modal').modal('show');
    });
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src = "<?= JS_URL . "cart.js"?>"></script>
   