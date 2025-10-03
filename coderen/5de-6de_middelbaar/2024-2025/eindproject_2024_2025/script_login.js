function validateRegisterForm() {
    var vnaam = $("#frmVoornaam").val();
    var naam = $("#frmNaam").val();
    var email = $("#frmEmailadres").val();
    var login = $("#frmGebruikersnaam").val();
    var password = $("#frmWachtwoord").val();
    var controlpassword = $("#frmControleWachtwoord").val();
    
    var commentaar = "";

    // Voornaam validatie
    if (vnaam == "") {
        $("#frmVoornaam").css("background-color", "red");
        commentaar += "Voornaam moet ingevuld worden. <br>";
    } else { 
        $("#frmVoornaam").css("background-color","");
    }

    // Naam validatie
    if (naam == "") {
        $("#frmNaam").css("background-color", "red");
        commentaar += "Naam moet ingevuld worden. <br>";
    } else { 
        $("#frmNaam").css("background-color","");
    }
    
    // E-mailadres validatie
    if (email == "") {
        $("#frmEmailadres").css("background-color", "red");
        commentaar += "E-mailadres moet ingevuld worden. <br>";
    } else { 
        $("#frmEmailadres").css("background-color","");
    }
    
    // Gebruikersnaam validatie
    if (login == "") {
        $("#frmGebruikersnaam").css("background-color", "red");
        commentaar += "Gebruikersnaam moet ingevuld worden. <br>";
    } else { 
        $("#frmGebruikersnaam").css("background-color","");
    }

    // Wachtwoorden validatie (optioneel)
    if (password !== "" || controlpassword !== "") {
        // Wachtwoordvelden mogen niet leeg zijn en moeten gelijk zijn
        if (password == "" || controlpassword == "") {
            $("#frmWachtwoord, #frmControleWachtwoord").css("background-color", "red");
            commentaar += "Beide wachtwoordvelden moeten ingevuld worden als je het wachtwoord wilt wijzigen.<br>";
        } else if (password !== controlpassword) {
            $("#frmWachtwoord, #frmControleWachtwoord").css("background-color", "red");
            commentaar += "Wachtwoorden komen niet overeen.<br>";
        } else {
            $("#frmWachtwoord, #frmControleWachtwoord").css("background-color", "");
        }
    } else {
        // Geen wachtwoord ingevuld, reset kleur
        $("#frmWachtwoord, #frmControleWachtwoord").css("background-color", "");
    }

    // Als er commentaar is, toon het dan
    if (commentaar != "") {
        $("#commentaar").html(commentaar).css("color", "red").show();
        return false; // Stop de form-submissie als er fouten zijn
    }

    return true; // Laat de form doorgaan als alles correct is
}
