age = int(input("Enter your age: "))

while age < 0:
    print("Age cannot be negative. Please enter a valid age.")
    age = int(input("Enter your age: "))

print(f"Your age is: {age} years old.")