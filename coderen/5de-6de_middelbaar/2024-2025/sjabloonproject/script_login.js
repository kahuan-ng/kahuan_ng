function validateRegisterForm() {
    var vnaam = $("#frmVoornaam").val();
    var naam = $("#frmNaam").val();
    var email = $("#frmEmailadres").val();
    var login = $("#frmGebruikersnaam").val();
    var password = $("#frmWachtwoord").val();
    var controlpassword = $("#frmControleWachtwoord").val();
    
    var commentaar = "";

    if (vnaam == "") {
        $("#frmVoornaam").css("background-color", "red");
        commentaar += "Voornaam moet ingevuld worden. <br>";
    } else { 
        $("#frmVoornaam").css("background-color","")
    }
    if (naam == "") {
        $("#frmNaam").css("background-color", "red");
        commentaar += "Naam moet ingevuld worden. <br>";
    } else { 
        $("#frmNaam").css("background-color","")
    }
    
    if (email == "") {
        $("#frmEmailadres").css("background-color", "red");
        commentaar += "E-mailadres moet ingevuld worden. <br>";
    } else { 
        $("#frmEmailadres").css("background-color","")
    }
    
    if (login == "") {
        $("#frmGebruikersnaam").css("background-color", "red");
        commentaar += "Gebruikersnaam moet ingevuld worden. <br>";
    } else { 
        $("#frmGebruikersnaam").css("background-color","")
    }

    if (password == "" || controlpassword == "" || password !== controlpassword) {
        $("#frmWachtwoord, #frmControleWachtwoord").css("background-color", "red");
        commentaar += "Wachtwoorden moeten ingevuld worden en moeten overeenkomen. <br>";
    } else { 
        $("#frmWachtwoord").css("background-color","")
        $("#frmControleWachtwoord").css("background-color","")

    } 

    if (commentaar != "") {
        $("#commentaar").html(commentaar).css("color", "red").show();
        return false; // ❌ Stop de form-submissie als er fouten zijn
    }

    return true; // ✅ Laat de form doorgaan als alles correct is
}