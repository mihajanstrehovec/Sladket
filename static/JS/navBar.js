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
      
        dodajArtikel.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
       
    break;

    case "narocila":
        
    if(naročilaProdajalec != null){
          naročilaProdajalec.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
        } else{
          narocilaStranka.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
        }
        
       
    break;

    case "stranke":
        stranke.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
    break;

    case "profil":

      if(profilProdajalec != null){
        profilProdajalec.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
      } else{
        profilStranka.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
      }
      

    break;

    case "registracija":

        registracija.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";

    break;

    case "vpis":
        vpis.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
    break;

    case "ustvari":

      ustvariProdajalca.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
        
    break;

    case "prodajalci":

      prodajalci.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";

    break;

    case "spremeni-geslo":
      nastavitveAdmin.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
    break;

    case "profil":

        profilProdajalec.style.textShadow = "0px 2px 0px rgba(0,0,0,0.25)";
        
    break;

}
