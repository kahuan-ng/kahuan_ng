using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace Prb.Variables.Scope.Wpf
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        //begin van MainWindow scope
        Random random = new Random(); //this variable can generate random numbers for you
        bool isBurnt = false;         //this should become a local variable in btnEatToast_Click
        int toasts = 15;              //stores the number of toasts left on table
        int eggs = 2;
        int CROISSANtS = 5;

        public MainWindow()
        {
            InitializeComponent();
        }

        //Executes when window is loaded for the first time
        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            //update labels
            lblToasts.Content = toasts;
            lblCroissants.Content = CROISSANtS;
            lblEggs.Content = eggs;
        }

        //Executes when clicking Button btnEatToast
        private void btnEatToast_Click(object sender, RoutedEventArgs e)
        {
            toasts = toasts - 1;        //remove one toast from the table
            lblToasts.Content = toasts; //update Label 

            isBurnt = Convert.ToBoolean(random.Next(2)); //crappy toaster has a 50% chance of burning your toast
            if(isBurnt)
            {
                MessageBox.Show(messageBoxText: "O nee! Je toast in aangebrand", "Toaster defect");
            }
        }

        //Executes when clicking Button btnEatCroissant
        private void btnEatCroissant_Click(object sender, RoutedEventArgs e)
        {
            CROISSANtS = CROISSANtS - 1;        //remove one croissant from the table
            lblCroissants.Content = CROISSANtS; //update Label 
        }

        private void btnEatEgg_Click(object sender, RoutedEventArgs e)
        {
            eggs = eggs - 1;
            lblEggs.Content = eggs;
        }
    }
}
