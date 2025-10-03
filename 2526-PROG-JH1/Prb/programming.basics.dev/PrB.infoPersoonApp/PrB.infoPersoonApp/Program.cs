namespace info_app
{
 internal class Program
    {
        static void Main(string[] args)
        {

            // ==> Eerste Project <== //

            /* 
             * Console.WriteLine(value: "Wat is je voornaam?");
            string surname;
            surname = Console.ReadLine();

            Console.WriteLine(value: "Hoe oud ben je?");
            int age;
            age = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine(value: "Hoeveel lang ben je?");
            double length;
            length = Convert.ToDouble(Console.ReadLine());

            Console.WriteLine(value: "Hoeveel weeg je?");
            decimal weight = Convert.ToDecimal(Console.ReadLine());

            Console.WriteLine("Hallo " + surname + "! Je bent " + age + " jaar oud, " + length + "m lang." + "En je weegt " + weight + "kg.");
            */



            // =>> Tweede project <<==

            /* Console.WriteLine("Welkom bij de Student Koffie- en Thee Tracker!");
            Console.WriteLine("Voer je naam in:");
            string name; 
                name = Console.ReadLine();

            Console.WriteLine("Hoeveel kopjes koffie heb je gedronken?");
            int quantityCoffee;
            quantityCoffee = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Hoeveel kopjes thee heb je gedronken");
            int quantityThee;
            quantityThee = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Wat is de prijs per kopje koffie?");
            decimal priceCoffee;
            priceCoffee = Convert.ToDecimal(Console.ReadLine());


            Console.WriteLine("Wat is de prijs per kopje thee?");
            decimal priceThee;
            priceThee = Convert.ToDecimal(Console.ReadLine());

            decimal totalPriceCoffee = quantityCoffee * priceCoffee;
            decimal totalPriceThee = quantityThee * priceThee;

            decimal totalPriceDrink = totalPriceCoffee + totalPriceThee;


            Console.WriteLine("Bedankt " + name + "! Je hebt vandaag " + quantityCoffee + " kopjes koffie gedronken en " + quantityThee + " kopjes thee gedronken.");
            Console.WriteLine("Het totale kostenbedrag bedraagt " + totalPriceDrink + " euro."); */

            // ==> Derde project <==

            //Console.WriteLine("Enter Your Name: ");
            //string person;
            //person = Console.ReadLine();

            //Console.WriteLine("Enter the date of the workout (YYYY-MM-DD): ");
            //DateTime date = Convert.ToDateTime(Console.ReadLine());

            //Console.WriteLine("Enter type of excercise:");
            //string excercise;
            //excercise = Console.ReadLine();

            //Console.WriteLine("Enter the duration in minutes:");
            //int duration;
            //duration = Convert.ToInt32(Console.ReadLine());

            //Console.WriteLine("Enter the estimated calories burned:");
            //decimal burnedCalories;
            //burnedCalories = Convert.ToDecimal(Console.ReadLine());

            //Console.WriteLine("Workout session for " + person + " on " + date.ToShortDateString());
            //Console.WriteLine("Type of excercise: " + excercise);
            //Console.WriteLine("Duration: " + duration + "minutes");
            //Console.WriteLine("Estimated calories burned: " + burnedCalories + "kcal");


            // ==> Vierde project <== //

            /* Console.WriteLine("Enter the snackname: ");
            string snack = Console.ReadLine();

            Console.WriteLine("Enter the price per piece: ");
            decimal price = Convert.ToDecimal(Console.ReadLine());

            Console.WriteLine("How many pieces?: ");
            int quanitity = Convert.ToInt32(Console.ReadLine());

            decimal totalPrice = price * quanitity; 

            Console.WriteLine("You bought " + quanitity + " piece(s) of " + snack + " for " + price + " each, total " + totalPrice + "." );
*/
            // ==> Vijfde project <== // Op het einde een bool gebruik als vraag als je doel hebt bereikt fo niet.

            Console.WriteLine("Voer je naam in: ");
            string name = Console.ReadLine();

            Console.WriteLine("Voer je leeftijd in: ");
            string age = Console.ReadLine();

            Console.WriteLine("Hoeveel milliliters water heb je vandaag gedronken?: ");
            decimal amount = Convert.ToDecimal(Console.ReadLine());

            Console.WriteLine("Hallo " + name + "! Je bent " + age + " jaar oud.");
            Console.WriteLine("Je hebt vandaag" + amount + "liter water gedronken.");
            Console.WriteLine("Heb jij je doel bereikt van 2l water per dag te drinken?: ");
            bool answer = Convert.ToBoolean(Console.ReadLine());

        }
    }
}
