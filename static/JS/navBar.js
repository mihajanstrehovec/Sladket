var ustvariProdajalca = document.getElementById('ustvariProdajalca');
var prodajalci = document.getElementById('prodajalci');
var nastavitveAdmin = document.getElementById("nastavitveAdmin");
var dodajArtikel = document.getElementById("dodajArtikel");
var naročilaProdajalec = document.getElementById("naročilaProdajalec");
var stranke = document.getElementById("stranke");
var profilProdajalec = document.getElementById("profilProdajalec");
var narocilaStranka = document.getElementById("narocilaStranka");
var profilStranka = document.getElementById("profilStranka");
var registracija = document.getElementById("registracija");
var vpis = document.getElementById("vpis");





var url = window.location.href;
var n = url.lastIndexOf('/');
var stran = url.substring(n + 1);
// console.log(result);

switch(stran){
    
    case "dodaj":
      
        dodajArtikel.style.textDecoration = "underline";
       
    break;

    case "narocila":
        
    if(naročilaProdajalec != null){
          naročilaProdajalec.style.textDecoration = "underline";
        } else{
          narocilaStranka.style.textDecoration = "underline";
        }
        
       
    break;

    case "stranke":
        stranke.style.textDecoration = "underline";
    break;

    case "profil":

      if(profilProdajalec != null){
        profilProdajalec.style.textDecoration = "underline";
      } else{
        profilStranka.style.textDecoration = "underline";
      }
      

    break;

    case "registracija":

        registracija.style.textDecoration = "underline";

    break;

    case "vpis":
        vpis.style.textDecoration = "underline";
    break;

    case "ustvari":

      ustvariProdajalca.style.textDecoration = "underline";
        
    break;

    case "prodajalci":

      prodajalci.style.textDecoration = "underline";

    break;

    case "spremeni-geslo":
      nastavitveAdmin.style.textDecoration = "underline";
    break;

    case "profil":

        profilProdajalec.style.textDecoration = "underline";
        
    break;

}
