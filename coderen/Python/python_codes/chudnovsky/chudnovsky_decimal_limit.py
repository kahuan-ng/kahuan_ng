import math
from decimal import Decimal, getcontext
import csv

# --- Helper function for Dutch decimal formatting ---
def format_number_for_dutch_locale(number, decimal_places=None):
    """
    Formats a number (float or Decimal) as a string using a comma (,) for decimals.
    Optionally limits the number of decimal places.
    """
    # Ensure the number is a Decimal for precise rounding
    decimal_number = Decimal(str(number)) 
    
    if decimal_places is not None:
        # Create a Decimal context for rounding to the specified precision
        # Example: '0.00' for 2 decimal places. '1' followed by 'decimal_places' zeros.
        quantize_format = Decimal('1e-' + str(decimal_places))
        
        # Round the number to the specified number of decimal places.
        # ROUND_HALF_EVEN is the default rounding mode.
        rounded_number = decimal_number.quantize(quantize_format)
        
        return str(rounded_number).replace('.', ',')
    else:
        # If no decimal_places specified, just replace the dot with a comma
        return str(decimal_number).replace('.', ',')

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
    # Set the internal precision for Decimal calculations.
    # This high precision is for the calculation itself, not the output format.
    getcontext().prec = 1000 

    C = Decimal(426880) * Decimal(math.sqrt(10005))
    A = Decimal(13591409)
    B = Decimal(545140134)
    # C_denom is the constant 640320^3 / 24, used in the denominator
    C_denom = Decimal(640320**3) / Decimal(24)

    sum_val = Decimal(0)
    estimated_pi_values = []
    
    # Determine interval to store results for graphing (aim for about 1000 points)
    interval = max(1, num_terms // 1000) 

    # Factorial function for Decimal numbers to handle large numbers precisely
    def factorial(n):
        res = Decimal(1)
        for i in range(2, n + 1):
            res *= Decimal(i)
        return res

    for k in range(num_terms):
        # Calculate each term of the Chudnovsky series
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

        # Calculate estimated Pi after adding the current term
        if sum_val != 0: # Avoid division by zero at the very beginning
            estimated_pi = C / sum_val
        else:
            estimated_pi = Decimal(0) # Should only happen for k=0 if sum_val is still 0

        # Store result at defined intervals or for the very last term
        if k % interval == 0 or k == num_terms - 1:
            # Format the estimated Pi value with a comma and limited decimals for the CSV
            # Increased to 25 decimal places to show more variation for Chudnovsky
            estimated_pi_formatted = format_number_for_dutch_locale(estimated_pi, decimal_places=25) 
            estimated_pi_values.append((k, estimated_pi_formatted))

    return estimated_pi_values

# --- Main execution block to generate CSV ---
if __name__ == "__main__":
    print("\nCalculating Pi using Chudnovsky formula...")
    # Set the number of terms. Even 100 terms give extreme precision, 
    # but more terms give more data points for the graph's convergence.
    num_terms_chudnovsky = 2000 # Let's use 2000 terms for a smoother graph in Numbers

    chudnovsky_results = calculate_chudnovsky_pi(num_terms_chudnovsky)

    # Save Chudnovsky results to a CSV file
    csv_filename = 'chudnovsky_pi_results.csv'
    with open(csv_filename, 'w', newline='') as csvfile:
        csv_writer = csv.writer(csvfile)
        csv_writer.writerow(['Term_Number', 'Estimated_Pi']) # Header row
        csv_writer.writerows(chudnovsky_results)
    print(f"Chudnovsky results saved to {csv_filename} (up to {num_terms_chudnovsky} terms)")

    print("\n--- How to use this file in Numbers on your iPad ---")
    print("1. Transfer the '.csv' file (chudnovsky_pi_results.csv) to your iPad.")
    print("   You can email it to yourself, use cloud storage (iCloud Drive, Google Drive, Dropbox), or AirDrop.")
    print("2. Open Numbers on your iPad.")
    print("3. Create a new blank spreadsheet or open your existing one.")
    print("4. Tap the 'Add' icon (the square with a plus sign) at the top.")
    print("5. Choose 'Import' or 'Insert From File' (the exact wording might vary).")
    print("6. Navigate to where you saved the CSV file and select it.")
    print("7. Numbers will import the data into a new table.")
    print("8. Once imported, select the columns 'Term_Number' and 'Estimated_Pi'.")
    print("9. Tap the 'Add' icon again, then 'Chart', and choose a 'Line Chart' to visualize the convergence of Pi.")
    print("10. You can add a reference line for the true value of Pi (e.g., 3.1415926535) for comparison.")
