namespace Prb.Variabelen.Cons
{   internal class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine(value: "Wat wil je drinken?");
            string drink; // string is tekst
            drink = Console.ReadLine();

            Console.WriteLine(value: "Hoeveel wil je er?");
            int quantity; // byte is een heel getal van 0 tot 255 om gebruik van data te beperken. Je gebruikt 4mb voor een byte
            quantity = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Hoeveel kost je drankje?");
            decimal price = Convert.ToDecimal(Console.ReadLine()); // We gebruiken Decimal om de decimalen te zien
            decimal totalPrice = quantity * price; // Hier moet je dan ook decimal doen bij de instance.

            Console.WriteLine("Je koos " + quantity + " " + drink + " en je moet " + totalPrice + " betalen.");
            byte number = 255; // max waarde van byte

            Console.WriteLine("Geef me een writeline");
            byte number2 = Convert.ToByte(Console.ReadLine());
        }
    }
}

