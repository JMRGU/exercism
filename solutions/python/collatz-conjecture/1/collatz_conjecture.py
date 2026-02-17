# Lots of ways to do this
# forced to use steps(number) encourages a loop
# I'll do this by simple counting, then by pushing to an array, then recursively (my preference)

def steps(number):
    if number < 1:
        raise ValueError("Only positive integers are allowed")
    steps = 0
    while (number >= 1):
        if (number == 1):
            return steps
        else:
            steps += 1
            number = number / 2 if number % 2 == 0 else 3 * number + 1
