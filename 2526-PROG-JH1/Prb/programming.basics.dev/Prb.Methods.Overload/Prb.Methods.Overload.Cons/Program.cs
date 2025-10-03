namespace Prb.Methods.Overload.Cons
{
    internal class Program
    {
        static void Main(string[] args)
        {
            double bmi = CalculateBmi(lengthInCm: 170, weight: 60);
            double bmi2 = CalculateBmi(lengthInM: 1.70, weight: 60);
            double bmi3 = CalculateBmi(name: "Ka-Huan", lengthInM: 1.70, weight: 60);
        }

        static double CalculateBmi(int lengthInCm, double weight)
        {
            double bmi = weight / (lengthInCm / 100) * (lengthInCm / 100);
            return bmi;
        }

        static double CalculateBmi(double lengthInM, double weight)
        {
            double bmi = weight / (lengthInM * lengthInM);
            return bmi;
        }

        static string CalculateBmi(string name, double lengthInM, double weight)
        {
            double bmi = weight / (lengthInM * lengthInM);
            return $"{name},je BMI is {bmi}";
        }



    }
}
