var k1 = document.getElementById('kat1');
var k1l = document.getElementById('k1l');
var k2 = document.getElementById("kat2");
var k2l = document.getElementById("k2l");
var k3 = document.getElementById("kat3");
var k3l = document.getElementById("k3l");
var k4 = document.getElementById("kat4");
var k4l = document.getElementById("k4l");

var url = window.location.search;
const urlParams = new URLSearchParams(url);
var kategorija = url.split("?")[0];
kategorija = urlParams.get("kategorija");


switch(kategorija){
    
    case "Kornet":
      
       k1.style.boxShadow = "0px 2px 0px rgba(0,0,0,0.25)";
       
    break;

    case "Na žlico":
      k2.style.boxShadow = "0px 2px 0px rgba(0,0,0,0.25)";
    break;

    case "Kepca":
      k3.style.boxShadow = "0px 2px 0px rgba(0,0,0,0.25)";
    break;

    case "Piškotek":
      k4.style.boxShadow = "0px 2px 0px rgba(0,0,0,0.25)";
    break;

}
