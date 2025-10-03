import random
import math
from decimal import Decimal, getcontext
import csv

# --- Helper function for Dutch decimal formatting ---
def format_number_for_dutch_locale(number):
    """
    Formats a number (float or Decimal) as a string using a comma (,) for decimals.
    """
    # Convert to string, then replace '.' with ','
    return str(number).replace('.', ',')

# --- Buffon's Naald Simulatie ---
def simulate_buffon_needle(num_needles, needle_length=1.0, line_spacing=1.0):
    """
    Simulates Buffon's Needle experiment to estimate Pi.

    Args:
        num_needles (int): The total number of needles to drop.
        needle_length (float): The length of the needle (L). Default is 1.0.
        line_spacing (float): The spacing between parallel lines (D). Default is 1.0.

    Returns:
        list: A list of estimated Pi values at various intervals.
              Each element is a tuple (iteration, estimated_pi_formatted_as_string).
    """
    if needle_length > line_spacing:
        print("Warning: For a simpler simulation, needle_length <= line_spacing is recommended.")

    crosses = 0
    estimated_pi_values = []
    
    # Store results at intervals for graphing
    interval = max(1, num_needles // 1000) # Store at least 1000 points for the graph

    for i in range(1, num_needles + 1):
        # Random position of the needle's center (distance from the nearest line)
        y_center = random.uniform(0, line_spacing / 2)

        # Random angle of the needle with the parallel lines (0 to pi radians)
        theta = random.uniform(0, math.pi)

        # Check for intersection
        if y_center <= (needle_length / 2) * math.sin(theta):
            crosses += 1

        # Calculate estimated Pi
        if crosses > 0: # Avoid division by zero
            estimated_pi = (2.0 * needle_length * i) / (line_spacing * crosses)
        else:
            estimated_pi = 0.0 # Or some indicator that it's not yet calculable

        if i % interval == 0 or i == num_needles:
            # Format the estimated Pi value with a comma for the CSV
            estimated_pi_formatted = format_number_for_dutch_locale(estimated_pi)
            estimated_pi_values.append((i, estimated_pi_formatted))
            
    return estimated_pi_values

# --- Chudnovsky Formule ---
def calculate_chudnovsky_pi(num_terms):
    """
    Calculates Pi using the Chudnovsky formula for a given number of terms.
    Requires high precision arithmetic.

    Args:
        num_terms (int): The number of terms (k) to sum in the series.

    Returns:
        list: A list of estimated Pi values after each term.
              Each element is a tuple (term_number, estimated_pi_formatted_as_string).
    """
    # Set the precision for Decimal calculations.
    getcontext().prec = 1000 # Set precision to 1000 decimal places

    C = Decimal(426880) * Decimal(math.sqrt(10005))
    A = Decimal(13591409)
    B = Decimal(545140134)
    C_denom = Decimal(640320**3) / Decimal(24)

    sum_val = Decimal(0)
    estimated_pi_values = []
    
    # Store results at intervals for graphing
    interval = max(1, num_terms // 1000) # Store at least 1000 points for the graph

    # Factorial function for Decimal numbers
    def factorial(n):
        res = Decimal(1)
        for i in range(2, n + 1):
            res *= Decimal(i)
        return res

    for k in range(num_terms):
        term = (
            Decimal((-1)**k)
            * factorial(6 * k)
            * (A + B * k)
        ) / (
            factorial(3 * k)
            * (factorial(k)**3)
            * (C_denom**k)
        )
        sum_val += term

        if sum_val != 0: # Avoid division by zero
            estimated_pi = C / sum_val
        else:
            estimated_pi = Decimal(0)

        if k % interval == 0 or k == num_terms - 1:
            # Format the estimated Pi value with a comma for the CSV
            estimated_pi_formatted = format_number_for_dutch_locale(estimated_pi)
            estimated_pi_values.append((k, estimated_pi_formatted))

    return estimated_pi_values

# --- Voorbeeldgebruik en opslaan naar CSV ---

if __name__ == "__main__":
    # --- Buffon's Naald Simulatie ---
    print("Running Buffon's Needle simulation...")
    num_needles_buffon = 100000 # A larger number for better approximation
    buffon_results = simulate_buffon_needle(num_needles_buffon)

    # Save Buffon's Needle results to a CSV file
    with open('buffon_pi_results.csv', 'w', newline='') as csvfile:
        csv_writer = csv.writer(csvfile)
        csv_writer.writerow(['Iteration', 'Estimated_Pi']) # Header row
        csv_writer.writerows(buffon_results)
    print(f"Buffon's Needle results saved to buffon_pi_results.csv (up to {num_needles_buffon} needles)")

    # --- Chudnovsky Formule ---
    print("\nCalculating Pi using Chudnovsky formula...")
    num_terms_chudnovsky = 100 # Even 100 terms give extreme precision
    chudnovsky_results = calculate_chudnovsky_pi(num_terms_chudnovsky)

    # Save Chudnovsky results to a CSV file
    with open('chudnovsky_pi_results.csv', 'w', newline='') as csvfile:
        csv_writer = csv.writer(csvfile)
        csv_writer.writerow(['Term_Number', 'Estimated_Pi']) # Header row
        csv_writer.writerows(chudnovsky_results)
    print(f"Chudnovsky results saved to chudnovsky_pi_results.csv (up to {num_terms_chudnovsky} terms)")

    print("\n--- How to use these files in Numbers on your iPad ---")
    print("1. Transfer the '.csv' files (buffon_pi_results.csv and chudnovsky_pi_results.csv) to your iPad.")
    print("   You can email them to yourself, use cloud storage (iCloud Drive, Google Drive, Dropbox), or AirDrop.")
    print("2. Open Numbers on your iPad.")
    print("3. Create a new blank spreadsheet or open your existing one.")
    print("4. Tap the 'Add' icon (the square with a plus sign) at the top.")
    print("5. Choose 'Import' or 'Insert From File' (the exact wording might vary).")
    print("6. Navigate to where you saved the CSV files and select one.")
    print("7. Numbers will import the data into a new table.")
    print("8. Once imported, you can select the columns 'Iteration'/'Term_Number' and 'Estimated_Pi'.")
    print("9. Tap the 'Add' icon again, then 'Chart', and choose a 'Line Chart' to visualize the convergence of Pi.")
    print("10. You can add a reference line for the true value of Pi (e.g., 3.1415926535) for comparison.")
