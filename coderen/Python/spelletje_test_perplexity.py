import tkinter as tk
from tkinter import ttk, messagebox
import random

class GuessGameApp(tk.Tk):
    def __init__(self):
        super().__init__()
        self.title("Nummerraadspel")
        self.geometry("420x260")
        self.resizable(False, False)

        self.secret = None
        self.attempts = 0

        # Notebook (tabs)
        notebook = ttk.Notebook(self)
        notebook.pack(fill="both", expand=True, padx=10, pady=10)

        self.tab_game = ttk.Frame(notebook)
        self.tab_info = ttk.Frame(notebook)
        notebook.add(self.tab_game, text="Spel")
        notebook.add(self.tab_info, text="Uitleg")

        # Bovenste rij: bereik en nieuw spel
        top = ttk.Frame(self.tab_game)
        top.pack(pady=8, fill="x")

        self.range_var = tk.IntVar(value=100)
        ttk.Label(top, text="Bereik: 1..").pack(side="left")
        range_entry = ttk.Entry(top, textvariable=self.range_var, width=6)
        range_entry.pack(side="left", padx=(4, 12))
        ttk.Button(top, text="Nieuw spel", command=self.new_game).pack(side="left")

        # Middelste rij: invoer en raden
        mid = ttk.Frame(self.tab_game)
        mid.pack(pady=12)

        ttk.Label(mid, text="Raad een getal:").grid(row=0, column=0, padx=4, pady=4)
        self.guess_var = tk.StringVar()
        self.entry = ttk.Entry(mid, textvariable=self.guess_var, width=12)
        self.entry.grid(row=0, column=1, padx=4, pady=4)
        self.entry.bind("<Return>", lambda e: self.check_guess())
        ttk.Button(mid, text="Raden", command=self.check_guess).grid(row=0, column=2, padx=4, pady=4)

        self.feedback = ttk.Label(self.tab_game, text="Klik 'Nieuw spel' om te beginnen.")
        self.feedback.pack(pady=6)

        # Info-tab
        info_text = ("Doel: raad het geheime getal binnen het gekozen bereik.\n"
                     "Tip: gebruik de hints 'Te laag' en 'Te hoog'.")
        ttk.Label(self.tab_info, text=info_text, justify="left").pack(anchor="w", padx=10, pady=10)

        # Focus op het bereikveld bij start
        self.after(100, lambda: range_entry.focus())

        self.new_game()

    def new_game(self):
        try:
            upper = int(self.range_var.get())
            if upper < 2:
                raise ValueError
        except Exception:
            upper = 100
            self.range_var.set(100)
        self.secret = random.randint(1, upper)
        self.attempts = 0
        self.feedback.config(text=f"Nieuw spel gestart: raad tussen 1 en {upper}.")
        self.guess_var.set("")
        self.entry.focus()

    def check_guess(self):
        s = self.guess_var.get().strip()
        try:
            g = int(s)
        except ValueError:
            messagebox.showerror("Ongeldige invoer", "Voer een geheel getal in.")
            self.entry.focus()
            self.entry.select_range(0, 'end')
            return

        upper = int(self.range_var.get())
        if not (1 <= g <= upper):
            messagebox.showwarning("Buiten bereik", f"Voer een getal tussen 1 en {upper} in.")
            return

        self.attempts += 1
        if g < self.secret:
            self.feedback.config(text="Te laag.")
        elif g > self.secret:
            self.feedback.config(text="Te hoog.")
        else:
            messagebox.showinfo("Gefeliciteerd!", f"Goed geraden in {self.attempts} beurten!")
            self.new_game()

if __name__ == "__main__":
    GuessGameApp().mainloop()
