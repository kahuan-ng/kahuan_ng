namespace info_app
{
    internal class Program
    {
        static void Main(string[] args)
        {

            // => Project 1

            Console.WriteLine("What is your first number?:");
            double num1 = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("What is your second number?:");
            double num2 = int.Parse(Console.ReadLine()); // Andere manier van Convert //


            Console.WriteLine("Your first number is: " + num1);
            Console.WriteLine("Your second number is: " + num2);


            double sun = num1 + num2;
            double difference = num1 - num2;
            double product = num1 * num2;
            double dividerWithFloat = num1 / 3f; // Gebruiken bij decimalen met veel getallen.
            double divider = num1 / num2; // Rond af.
            double modulo = num1 % num2; // Telt de rest op van de deler ervoor.

            Console.WriteLine("De som van de getallen " + num1 + " + " + num2 + " is = " + sun);
            Console.WriteLine(value: $"Het verschil van de getallen {num1} - {num2} = {difference}");
            Console.WriteLine(value: $"Het product van de getallen {num1} * {num2} = {product}");
            Console.WriteLine(value: $"Het quotient van de getallen met 3f als deler is {num1} / 3f = {dividerWithFloat}");
            Console.WriteLine(value: $"Het quotient van de getallen  {num1} / {num2} = {divider}");
            Console.WriteLine(value: $"De rest van de getallen {num1} % {num2} = {modulo}");

            num1 = num1 += 1;
            Console.WriteLine(value: $"Het nummer plus 1 = {num1}.");

            num1 = num1 -= 1;
            Console.WriteLine(value: $"Het nummer min 1 = {num1}.");
        }
    }
}