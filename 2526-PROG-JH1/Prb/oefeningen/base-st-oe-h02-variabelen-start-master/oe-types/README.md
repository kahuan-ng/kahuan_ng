## Variabelen - Types

In deze oefening leer je de correcte datatypes kiezen voor verschillende soorten variabelen.
Tegelijkertijd kan je het bouwen van een gebruikersinterface in WPF wat inoefenen.

1. Start een nieuw WPF project in C#
2. Bouw de onderstaande GUI na

<img width="500" alt="image" src="https://user-images.githubusercontent.com/17463331/187044148-f31fea8f-0a0c-4bea-aa6a-1e7c272ad4a6.png">

Dit scherm bevat 5 Labels, 5 TextBoxes, 1 CheckBox en 1 Button.

3. Geef de TextBoxes, CheckBoxes en Button een passende naam.
4. Open de codebehind van het MainWindow, genaamd `MainWindows.xaml.cs`
5. In de scope van de `class`, declareer je variabelen met een **passend type** en **passende naam** voor de volgende waarden:
    - de naam van de campus: `Howest Brugge`
    - breedtegraad en lengtegraad van dit adres: *Spoorwegstraat 4, Brugge* (kan je online opzoeken)
    - de prijs voor een lunchmaaltijd: `4,50` euro
    - het feit of er een cafetaria is of niet (wel dan niet aanwezig): `true`
    - het aantal lokalen: `200`, kan nooit hoger zijn dan 210.
    - het aantal studenten: `10000`

Let goed op de aard van de data die je in een variabele stopt en kies het best passende type.

6. Maak een Click event handler voor de Button, die opgeroepen zal worden wanneer de gebruiker erop klikt.
7. Wanneer de gebruiker op de knop klikt, dan moeten de waarden afgebeeld worden in de overeenkomstige TextBoxes en Checkbox.

! Merk op: om een getalwaarde te kunnen afbeelden in een TextBox zal je deze eerst naar een string moeten omzetten. Dit kan met de `.ToString()` methode, bijvoorbeeld: `txtMyTextBox.Text = myNumber.ToString()`

8. In de `MainWindow()` scope, onder Initialize methode, zorg je ervoor dat de naam van de campus afgebeeld wordt in de titelbalk van het venster. Hierdoor wordt de naam direct bij het opstarten bovenaan getoond.

Het eindresultaat, na klikken op de knop, ziet er nu zo uit:

<img width="500" alt="image" src="https://user-images.githubusercontent.com/17463331/187044597-6093fd86-c952-4fa4-9895-1bed91abde44.png">
