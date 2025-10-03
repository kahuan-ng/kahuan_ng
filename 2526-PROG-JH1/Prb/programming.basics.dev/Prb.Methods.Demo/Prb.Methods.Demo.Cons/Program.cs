namespace Prb.Methods.Demo.Cons
{
    internal class Program
    {
        static void Main(string[] args)
        {
            //Console.WriteLine(value: "Geef je naam.");
            //string userName = Console.ReadLine();

            //Console.WriteLine(value: "Welke dag zijn we vandaag.");
            //string dayOfWeek = Console.ReadLine();

            //Console.WriteLine(value: "Welke jaar ben je geboren.");
            //int yearOfBirth = int.Parse(Console.ReadLine());

            //Console.WriteLine(value: "Welke karakter wil je toevoegen?");
            //char favoriteChar = Console.ReadLine()[index: 0];

            //Console.WriteLine(value: "Hoeveel keren wil je de karakters weergeven?");
            //int amountOfChar = int.Parse(Console.ReadLine());


            //PrintSentence(userName, dayOfWeek, yearOfBirth); // Het aanroepen van methode PrintSentence() en de variabelen daarin.
            //PrintLine(favoriteChar, amountOfChar);


            Console.WriteLine(value: "Geef nummer 1: ");
            int number1 = int.Parse(Console.ReadLine());

            Console.WriteLine(value: "Geef nummer 1: ");
            int number2 = int.Parse(Console.ReadLine());

            int result = CalculateSum(number1, number2);
            Console.WriteLine(value: $"De som van {number1} en {number2} \n is {result}");

        }

        static void PrintSentence(string userName, string DayOfWeek, int yearOfBirth)
        {
            Console.WriteLine(value: $"Hello, {userName}! Vandaag is het {DayOfWeek}");
            Console.WriteLine(value: $"{yearOfBirth}");


        }

        static void PrintLine(char favoriteChar, int amountOfChar)
        {
            string line = new string(favoriteChar, amountOfChar);
            Console.WriteLine(value: $"Ik wil {favoriteChar} {amountOfChar} weergeven.");
        }


        static int CalculateSum(int number1, int number2)
        {
            int sum = number1 + number2;
            return sum;
        }
        
    }
}