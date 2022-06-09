const getRandomNumber = (maxNum) => {
  return Math.floor(Math.random() * maxNum);
};
 
const getRandomColor = () => {
  const h = getRandomNumber(255);
  const s = getRandomNumber(255);
  const l = getRandomNumber(255);
 
  return `rgb(${h},${s},${l});`;
};

var randomColor = 0;

$( '.resaltar' ).click(function() {
    $( this ).toggleClass( "borderrosa" );
    var title = $( this ).attr( "id" );
    var valor = $( this ).attr( "value" );
    var td_analizar = document.querySelectorAll('td[id="'+`${title}`+'"]');
    
    //se cambia el color de la etiqueta mark
    if ($(this).hasClass("borderrosa")) {
        randomColor = getRandomColor();
    }
   
    for (let index = 0; index < td_analizar.length; index++) {
      if ($(this).hasClass("borderrosa")) {
        //td_analizar[index].css("color: white");
        //se obtiene el valor 
        text = td_analizar[index].innerHTML;
        console.log(randomColor);
        //se crea la etique mark con variable de colores
        marked = text.replace(valor,"<mark style=background-color:"+randomColor+">"+valor+"</mark>");
        
        
       //aqui se pinta el mar
        td_analizar[index].innerHTML = marked;
        
        
        $(this).css("background-color: white");
        this.style.cssText = 'background-color: '+randomColor+'; color: white;';
      } else {
        
          td_analizar[index].innerHTML = td_analizar[index].innerHTML.replace(/<\/?mark[^>]*>/g,"");
          this.style.backgroundColor = null;
          this.style.color = null;
          //console.log(valor);
      }
      
    }
    
   
  
  });

 