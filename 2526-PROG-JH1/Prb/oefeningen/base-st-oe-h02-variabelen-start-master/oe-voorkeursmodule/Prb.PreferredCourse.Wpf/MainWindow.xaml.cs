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

namespace Prb.PreferredCourse.Wpf
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        string name;

        public MainWindow()
        {

            InitializeComponent();
        }

        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            btnOK.Visibility = Visibility.Hidden;
            lstPreference.Items.Add(newItem: "PRB");
            lstPreference.Items.Add(newItem: "PRA");
            lstPreference.Items.Add(newItem: "CIB");
            //lstPreference.SelectedIndex = 0;
        }
        private void txtName_TextChanged(object sender, TextChangedEventArgs e)
        {
            btnOK.Visibility = Visibility.Visible;
            name = txtName.Text;
        }

        private void btnOK_Click(object sender, RoutedEventArgs e)
        {
            name = txtName.Text;
            lblWelcome.Content = $"Welkom in Howest, {name}";
                }
        private void lstPreference_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            string preferredCourse;
            preferredCourse = lstPreference.SelectedItem.ToString();
            tbkFeedBack.Text = $"{name}, je voorkeur gaat uit naar {preferredCourse}.";
        }
    }
}
