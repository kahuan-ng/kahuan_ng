$(document).ready(function(){
    $("#click").click(function(){
        $(this).css("background-color", "orange");
    }); 
    $("#doubleclick").dblclick(function(){
        $(this).css("background-color", "pink");
    });
    $("#hover").hover(function(){
        $(this).css("background-color", "purple");
    },
      function(){
        $(this).css("background-color", "green");
    });
    $("#mouseenter").mouseenter(function(){
        $(this).css("background-color", "black");
    });
    $("#fill").click(function(){
        $(this).text("goede dag!");
    });
    $("#read").click(function(){
        alert("read me");
    });
    $("#hide").click(function(){
        $(this).hide();
    });
    $("#move").click(function(){
        $(this).animate({right: '-200px'});
    });
    $("#fillrdn").click(function() {
        $(this).each(function(index) {
          var colorR = Math.floor((Math.random() * 256));
          var colorG = Math.floor((Math.random() * 256));
          var colorB = Math.floor((Math.random() * 256));
          $(this).css("background-color", "rgb(" + colorR + "," + colorG + "," + colorB + ")");
        });
    });
    $("#fillAJAX").click(function(){
        $(this).load("afbeelding.html");
    });
});
