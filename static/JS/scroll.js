// ČE bo čas implementiraj funkcijo, ki bo glede na scroll premaknila ozadje zna bit lit



function zoom(event) {
    imgSc = document.getElementById("bgIMGscroll");
    event.preventDefault();
  
     if (event.deltaY < 0) {
       // Zoom in
       scale -= event.deltaY * +4;
     }
     else {
       // Zoom out
       scale -= event.deltaY * +4;
     }
    
  

    // Restrict scale
    //scale = Math.min(Math.max(.125, scale), 4);
    //console.log()
    // Apply scale transform
    imgSc.style.transform = `translateY(${scale}px)`;
  }
  
  let scale = 1;
  const el = document.querySelector('div');
  document.onwheel = zoom;