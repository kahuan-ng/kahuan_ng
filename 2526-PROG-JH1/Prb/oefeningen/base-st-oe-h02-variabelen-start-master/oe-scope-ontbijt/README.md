# Ontbijttafel

Clone dit project naar een map op je PC volgens de werkwijze die je hebt geleerd in Continuous Integration Basics.

## Werking

Via deze applicatie kan de gebruiker zijn ontbijt samenstellen. De Graphical User Interface (GUI) ziet er als volgt uit:

- Bij het klikken op de knop Toast wordt er een toastbroodje weggenomen van tafel
- Bij het klikken op de knop Croissant wordt er een croissant weggenomen van tafel
- Bij het klikken op de knop Eitje wordt er een ei weggenomen van tafel

Het aantal overblijvende toastbroodjes wordt bijgehouden in de class-scoped variabele `toasts`. De beginwaarde ervan is `15`.
Merk op dat toaster defect is. Er is 50 % kans dat je toast verbrand uit het toestel springt.

## Opgave

De code van de applicatie is onvolledig. Door deze complilatiefouten kan je het programma niet uitvoeren.

### Stap 1: Make it run!

Er wordt een variabele genaamd `CROISSANtS` gebruikt die nergens gedeclareerd is. 
1. Declareer deze variabele in de class-scope, zodat die het aantal overblijven croissants kan bijhouden.
2. Initializeer deze variabele op `5`.
3. Hernoem de variabele volgens de naamgevingsconventies.

Hierna kan je de applicatie uitvoeren.


### Stap 2: Verbrande toast

De slechte werking van de toasts wordt gesimuleerd met een willekeurigheid. Indien de toast verbrand is, dan wordt de `isBurnt` variabele ingesteld op `true`.
Deze `isBurnt` variabele is momenteel toegankelijk voor alle code in de class-scope, maar moet enkel gebruikt worden in de event handler `BtnEatToast_Click()`.

1. Herdeclareer/verplaats deze variabele naar de method-scope van `BtnEatToast_Click`
2. Voer de applicatie uit en controleer de juiste werking.

### Stap 3: Eitjes

De knop "Eitje" werkt niet. 
1. Declareer een variabele van het type `int` dat het aantal overblijvende eitjes moet bijhouden. Respecteer de naamgevingsconventies. Kies de beste scope voor deze variabele.
2. Initializeer deze variabele op waarde `2`.
3. Zorg dat het aantal eieren getoond wordt zodra het venster is geladen.
4. Maak een Click event handler voor deze knop, en geef deze een gelijkaardige functionaliteit als die van de "Croissant" knop. 

![prb-variabele-ontbijttafel](https://user-images.githubusercontent.com/17463331/187070490-0ee3bedd-0182-4cf5-afac-6d4066df421c.gif)

