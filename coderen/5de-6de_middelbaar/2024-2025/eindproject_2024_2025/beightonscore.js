let huidigeSlide = 0;

// Zet de vragen buiten window.onload zodat andere functies deze ook kunnen gebruiken
const vragen = [
  { tekst: "Buigt je pink verder dan 90°? (links)" },
  { tekst: "Buigt je pink verder dan 90°? (rechts)" },
  { tekst: "Kan je je duim naar je onderarm brengen? (links)" },
  { tekst: "Kan je je duim naar je onderarm brengen? (rechts)" },
  { tekst: "Strekt je elleboog meer dan 10° naar achter? (links)" },
  { tekst: "Strekt je elleboog meer dan 10° naar achter? (rechts)" },
  { tekst: "Strekt je knie meer dan 10° naar achter? (links)" },
  { tekst: "Strekt je knie meer dan 10° naar achter? (rechts)" },
  { tekst: "Kan je met je handpalmen plat op de grond staan met gestrekte knieën?" },
  { tekst: "Kan je je benen in je nek leggen of andere 'speciale trucs' uitvoeren?" }
];

window.onload = () => {
  const container = document.getElementById("slides");
  vragen.forEach((vraag, index) => {
    const div = document.createElement("div");
    div.className = "slide w3-animate-opacity" + (index === 0 ? " active" : "");
    div.innerHTML = `
      <p class="w3-large">${vraag.tekst}</p>
      <label><input type="radio" name="vraag${index}" class="w3-radio score" value="ja"> Ja</label><br>
      <label><input type="radio" name="vraag${index}" class="w3-radio score" value="nee"> Nee</label><br>
    `;
    container.appendChild(div);
  });
};

function volgendeVraag() {
  document.querySelectorAll(".slide")[huidigeSlide].classList.remove("active");
  huidigeSlide++;
  const slides = document.querySelectorAll(".slide");

  if (huidigeSlide < slides.length) {
    slides[huidigeSlide].classList.add("active");
    if (huidigeSlide === slides.length - 1) {
      document.getElementById("toonResultaat").classList.remove("w3-hide");
    }
    document.querySelector("button.w3-button.w3-indigo").classList.remove("w3-hide");
  } else {
    huidigeSlide = slides.length - 1; // Zorgt ervoor dat hij niet uit de index loopt
  }
}

function vorigeVraag() {
  if (huidigeSlide > 0) {
    document.querySelectorAll(".slide")[huidigeSlide].classList.remove("active");
    huidigeSlide--;
    document.querySelectorAll(".slide")[huidigeSlide].classList.add("active");
    document.getElementById("toonResultaat").classList.add("w3-hide");
  }
}

function toonScore() {
  const scoreChecks = document.querySelectorAll(".score");
  let score = 0;

  scoreChecks.forEach(cb => { if (cb.checked && cb.value === "ja") score++; });

  let interpretatie = "";
  if (score <= 2) {
    interpretatie = "Je hebt waarschijnlijk geen hypermobiliteit of slechts lokaal.";
  } else if (score <= 4) {
    interpretatie = "Mogelijke milde hypermobiliteit, afhankelijk van je klachten.";
  } else if (score <= 6) {
    interpretatie = "Er is een duidelijke aanwijzing voor hypermobiliteit.";
  } else {
    interpretatie = "Je scoort hoog op de Beighton-test. Grote kans op gegeneraliseerde hypermobiliteit.";
  }

  const resultDiv = document.getElementById("resultaat");
  resultDiv.classList.remove("w3-hide");
  resultDiv.innerHTML = `
    <h3>Jouw Resultaat</h3>
    <p><strong>Beighton-score:</strong> ${score}/9</p>
    <p>${interpretatie}</p>
    <p>Let op: dit is een indicatieve test en geen medische diagnose.</p>
  `;

  document.getElementById("toonResultaat").classList.add("w3-hide");

  // ✨ Toon de e-mail pop-up
  document.getElementById('emailModal').style.display = 'block';
}

function resetTest() {
  const radioButtons = document.querySelectorAll(".score");
  radioButtons.forEach(radio => radio.checked = false);

  const resultDiv = document.getElementById("resultaat");
  resultDiv.classList.add("w3-hide");

  huidigeSlide = 0;
  document.querySelectorAll(".slide").forEach(slide => slide.classList.remove("active"));
  document.querySelectorAll(".slide")[huidigeSlide].classList.add("active");

  document.getElementById("toonResultaat").classList.add("w3-hide");
}