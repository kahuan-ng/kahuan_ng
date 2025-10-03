import tkinter as tk
from tkinter import messagebox

# The main window is created once, globally, to prevent window stacking.
root = None

def on_yes():
    # This message now appears first.
    messagebox.showinfo("Response", "I like you too :)")
    # After the user clicks "OK", the window will be closed.
    root.destroy()

def on_no():
    # No changes here, the message box will show and the main window remains.
    messagebox.showinfo("Response", "Are you sure? Try again.")

def on_cancel():
    # The message is now "destroyed" as requested, by closing the window.
    root.destroy()

def main_window():
    global root
    # Only create the window if it doesn't exist yet.
    if root is None or not root.winfo_exists():
        root = tk.Tk()
        root.title("A Simple Question")
        
        label = tk.Label(root, text="Do You Like Me?")
        label.pack(padx=100, pady=10)

        button_frame = tk.Frame(root)
        button_frame.pack(pady=10)

        yes_button = tk.Button(button_frame, text="Yes", bg="green", fg="white", command=on_yes)
        yes_button.pack(side="left", padx=5)

        no_button = tk.Button(button_frame, text="No", bg="red", fg="white", command=on_no)
        no_button.pack(side="left", padx=5)

        cancel_button = tk.Button(button_frame, text="Cancel", command=on_cancel)
        cancel_button.pack(side="left", padx=5)

    root.mainloop()

if __name__ == "__main__":
    main_window()
