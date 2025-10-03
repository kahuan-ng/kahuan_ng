$(document).ready(function(){
    $("td").each(function(){
      var randomNumber = Math.floor(Math.random()* 10)+1; //random nummer tussen 1 en 10 - "floor" = afronden naar beneden
      if ((randomNumber%2)===0) { //is de rest 0 bij de deling door 2?
          $(this).addClass("rood"); //even getal
      } else {
          $(this).addClass("blauw"); //oneven getal
      }
    });
    $("td").click(function(){
        $(this).toggleClass("rood").toggleClass("blauw");
        $(this).prev().toggleClass("rood").toggleClass("blauw");
        var index = $(this).index();
        $(this).parent().prev().children(":nth("+index+")").toggleClass("rood").toggleClass("blauw");
        $(this).parent().next().children(":nth("+index+")").toggleClass("rood").toggleClass("blauw");
    });
});