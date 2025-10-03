$(document).ready(function(){
  $("#clickme").click(function(){
    $(this).css("background-color", "orange");
  });
});

$(document).ready(function(){
  $("#dbclickme").dblclick(function(){
    $(this).css("background-color", "pink");
  });
});

$(document).ready(function(){
  $("#hoverme").hover(function(){
    $(this).css("background-color", "purple");
    }, function(){
    $(this).css("background-color", "green");
  });
});

$(document).ready(function(){
  $("#enterme").mouseenter(function(){
    $(this).css("background-color", "black");
  });
});

$(document).ready(function(){
  $("#fillme").click(function(){
    $(this).text("Goede dag!");
  });
});

$(document).ready(function(){
  $("#readme").click(function(){
    alert("Read-me").text();
  });
});

$(document).ready(function(){
  $("#hideme").click(function(){
    $(this).hide();
  });
});

$(document).ready(function(){
  $("#moveme").click(function(){
    $(this).animate({right: '50px'});
  });
});

