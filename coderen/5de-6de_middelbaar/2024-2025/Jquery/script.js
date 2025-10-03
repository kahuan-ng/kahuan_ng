$(document).ready(function(){
    $("td").each(function(){
        var randomNumber = Math.floor(Math.random() * 10)+1;
        if ((randomNumber%2)===0) { // Is de rest 0 bij deling door 2? // even getal
            $(this).addClass("rood");
        } else { // oneven getal
            $(this).addClass("blauw");
        }
    });
    
    $("td").click(function(){
        $(this).toggleClass("rood").toggleClass("blauw");
        $(this).prev().toggleClass("rood").toggleClass("blauw");
        $(this).next().toggleClass("rood").toggleClass("blauw");
        var index = $(this).index();
        $(this).parent().prev().children(":nth("+index+")").toggleClass("rood").toggleClass("blauw");
        $(this).parent().next().children(":nth("+index+")").toggleClass("rood").toggleClass("blauw");

    });
});