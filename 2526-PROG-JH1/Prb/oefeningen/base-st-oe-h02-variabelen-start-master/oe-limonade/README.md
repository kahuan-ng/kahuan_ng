# Variabelen - parse en cast

De bijgevoegde applicatie bevat een bestelformulier waarmee je voor meerdere personen limonade kan kopen.
Een koper moet in elke TextBox een waarde ingeven:

Liters to Buy: het aantal gewenste liters, mogelijks een kommagetal
Price / L: de prijs per liter, mogelijks een kommagetal
Persons: hoeveel personen er samen inkopen
Consent: bevat gewoon de tekst "true" 

Wanneer de gebruiker op de knop dient het volgende te gebeuren:
- De prijs zonder BTW (no VAT) wordt berekend en weergegeven
- De BTW (VAT) wordt berekend en weergegeven
- Prijs inclusief BTW wordt berekend en weergegeven
- Het aantal liters per persoon wordt berekend en weergegeven

Je hoeft deze berekeningen echter niet zelf doen. Een collega van je heeft deze functionaliteit reeds geschreven in een methode genaamd `ProcessOrder`.

Er zit echter een grote fout in de applicatie:
De waarden die meegegeven worden bij het oproepen van deze methode zijn fout. Je collega gebruikt hier de `.Text` waarden uit de Textboxes. Dat zijn `string` types, en niet de gewenste types van de methode (`decimal`s, `float`, `short, en `bool`).

## Opgave

1. Zet de waarden in de Textboxen eerst om naar een variabele van het gepaste type. In totaal zal je dus 5 variabelen moeten declareren in de scope van `btnProcessOrder_Click`.
    - Gebruik een cast, Parse of Convert waar nodig.
    - alle `.Text` waarden zijn `string`s, die omgezet moeten worden naar het gewenste type.
    - de variabele `vatTax` is een `decimal` die omgezet moet worden naar een `float`.
2. Geef deze variabelen tenslotte mee aan de `ProcessOrder()` in plaats van de `???.Text` waarden. 

De methode `ProcessOrder()` berekent de uitvoer. Daaraan hoef je niets meer te wijzigen.
Als alles goed is kan de applicatie zonder fouten gestart worden en zie je het volgende:

<img width="500" alt="image" src="https://user-images.githubusercontent.com/17463331/187046072-21f3f069-40e4-415e-b682-2e2c13f0bf64.png">
