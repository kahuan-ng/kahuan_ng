$(document).ready(function(){
    $(".button").click(function() {
        $("td").each(function() {
        var randomColor = '#'+ ('000000' + Math.floor(Math.random()*16777215).toString(16)).slice(-6);
            $(this).css({'background-color' : randomColor });
        });
    })

    $("td").each(function() {
        var randomColor = '#'+ ('000000' + Math.floor(Math.random()*16777215).toString(16)).slice(-6);
            $(this).css({'background-color' : randomColor });
    });
})