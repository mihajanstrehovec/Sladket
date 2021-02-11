<?php
require_once 'db_files/db_artikel.php';
#var_dump($_SESSION);
#exit();
?>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,400;0,500;0,600;0,700;0,800;1,300;1,400&display=swap" rel="stylesheet"> 

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet"> 


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel ="stylesheet" href ="<?= CSS_URL . "mainStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "trgovinaStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "loginStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "profilStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "kosaricaStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "zakljucek_nakupaStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "moja_narocilaStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "strankeStyle.css" ?>">
<link rel ="stylesheet" href ="<?= CSS_URL . "links.css" ?>">


<link rel ="stylesheet" href ="<?= CSS_URL . "newStyle.css" ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<nav class="navbar navbar-expand-lg navbar-dark static-top">
  <div class="container">
    <a id = "smarket"class="navbar-brand sMarket" href ="<?= BASE_URL . "trgovina" ?>">
          SLADKET
    </a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">

        <?php if($_SESSION["tipUporabnika"] == "admin") :?> <!-- PRODAJALEC MENI -->
          <li class="nav-item" >
            <a class="navbar-brand" href ="<?= BASE_URL . "admin/prodajalec/ustvari" ?>" id = "ustvariProdajalca"  style = "color: #f5face;"> USTVARI PRODAJALCA</a>
          </li>

        <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "admin/prodajalci" ?>" id = "prodajalci"  style = "color: #f5face;"> PRODAJALCI</a>
          </li>

        <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "admin/spremeni-geslo" ?>" id = "nastavitveAdmin" style = "color: #f5face;"> NASTAVITVE </a>
        </li>

        <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL .  "izpisi" ?>" id = "izpisiAdmin" style = "color: #f5face;"> IZPIS </a>
        </li>
       



        <?php elseif($_SESSION["tipUporabnika"] == "prodajalec") :?> <!-- PRODAJALEC MENI -->

          <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "artikel/dodaj" ?>" id = "dodajArtikel" style = "color: #f5face;"> DODAJ ARTIKEL</a>
          </li>
          
          <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "prodajalec/narocila" ?>" id = "naročilaProdajalec" style = "color: #f5face;"> NAROČILA</a>
          </li>

          <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "prodajalec/stranke" ?>" id = "stranke" style = "color: #f5face;"> STRANKE </a>
          </li>
 
          <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "prodajalec/profil" ?>" id = "profilProdajalec"  style = "color: #f5face;"> PROFIL </a>
          </li>

          <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "izpisi" ?>"  style = "color: #f5face;"> IZPIS </a>
          </li>

        
        
        
        
        
        
        
        <?php elseif($_SESSION["tipUporabnika"] == "stranka") :?>
          <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "profil/narocila" ?>" id = "narocilaStranka" style = "color: #f5face;">  MOJA NAROČILA </a>
          </li>
          
          

          <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "profil" ?>" id = "profilStranka" style = "color: #f5face;"> PROFIL </a>
          </li>

          <li class="nav-item">
            <a class="navbar-brand" href ="<?= BASE_URL . "izpisi" ?>"  style = "color: #f5face;"> IZPIS </a>
          </li>

          
        
        <?php else:?>

          <li class="nav-item">
              <a class="navbar-brand" href ="<?= BASE_URL . "uporabnik/registracija" ?>" id = "registracija" style = "color: #f5face;"> REGISTRACIJA </a>
            </li>

          <li class="nav-item">
              <a class="navbar-brand" href ="<?= BASE_URL . "uporabnik/vpis" ?>" id = "vpis" style = "color: #f5face;"> VPIS </a>
          </li>

          <li class="nav-item">
            <!--<a class="navbar-brand" href ="<?= BASE_URL . "prodajalec/vpis" ?>" VPIS - PRODAJALEC </a>-->
          </li>

        <?php endif?>

        
      </ul>
    </div>
    
  </div>
  <?php if($_SESSION["tipUporabnika"] == "stranka") :?>
    <a href ="<?= BASE_URL . "zakljucekNakupa" ?>"><button  id = "cartBtn" onmouseover ="showCart()" onmouseout = "hideCart()"><img src = "<?= IMAGES_URL . "shopping-cart.png"?>" width = "20px" height = "20px"></button></a>
  <?php endif?>
</nav> 

<?php
$_SESSION['price'] = array(100);


?>
<?php if($_SESSION["tipUporabnika"] == "stranka"): ?>
<div id="cart" onmouseover ="showCart()" onmouseout = "hideCart()">
        
            <h3 id = "kos">Košarica</h3>
            <p><?php
            $total = 0;
            if (isset($_SESSION["cart"])): {
                    
                    
                    for($i = 0; $i <= 200; $i++){
                    
                    // Preverimo, če je artikel z id-jem $i nastavljena
                    if(isset($_SESSION["cart"][$i])){
                        $idTr["idArtikla"] = $i;
                        $trArtikel = eshopDB::get($idTr);// Pridobimo objekt artikel iz DB in ga shranimo v $artikel
                        $total += $trArtikel["cenaArtikla"] * $_SESSION["cart"][$i]; // K skupni ceni prištejemo ceno artikla pomnoženo s številom le tega 
                        ?> 
                          <!-- HTML obrazec v katerem lahko nastavimo število knjig in posodobimo to vrednost-->
                          <form action="<?= BASE_URL . "artikel" ?>" method="post">
                              <input type="hidden" name="do" value="update_cart" />
                              <input type="hidden" name="idArtikla" value="<?= $trArtikel["idArtikla"] ?>" />
                              
                              <input type="number" name= "quantity" value = "<?= $_SESSION["cart"][$i]?>" class ="kosaricaKolicina"/> <!--Število artiklov -->
                              
                              <?= $trArtikel["imeArtikla"] ?>
                              
                              <!-- Gumb za praznenje košarice, ki v php sproži case 'update_cart' in posledično posodobi število artiklov -->
                              <button class ="btn btn-secondary" type="submit">Posodobi</button>
                          </form>   
            <?php
                    
                    
                    }
                  }
                $_SESSION['total'] = $total;
                print ("Skupna cena:" . " ". "<strong>". $total . "</strong>");
                
                
            }?>

              <div class = "row justify-content-center">
                <!-- Gumb za praznenje košarice, ki v php sproži case 'purge_cart' in posledično unset($_SESSION['cart']) -->
                
                <a href ="<?= BASE_URL . "zakljucekNakupa" ?>"><button  id = "cartBtn" onmouseover ="showCart()" onmouseout = "hideCart()">
                <button type="submit" name ="do" class ="btn btn-success" value = "purge_cart" style = "margin-right: 10px;">Na blagajno</button></a>
              
                <form action="<?= BASE_URL . "izprazni" ?>" method="post">
                    <button type="submit" name ="do" class ="btn btn-danger" value = "purge_cart">Sprazni</button>
                </form>
              </div>
                
            <?php else : ?>
                Košara je prazna
                
                    
            <?php endif;?></p>
        </div>
<?php else: ?> 
<p id ="cart">Za uporabo kosarice se prosim prijavite.</p>     
<?php endif;?>
        <!--<?= var_dump($_SESSION); ?>-->
        

<img id="bgIMGscroll" src = "<?= IMAGES_URL . "bgScroll.png"?>" style=" z-index: -10000; position: absolute; left:0; top:-1000px; opacity: 0.3">



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src = "<?= JS_URL . "cart.js"?>"></script>
<script src = "<?= JS_URL . "navBar.js"?>"></script>
<script src = "<?= JS_URL . "scroll.js"?>"></script>

