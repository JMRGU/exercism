# Lots of ways to do this
# forced to use steps(number) encourages a loop
# I'll do this by simple counting, then by pushing to an array, then recursively (my preference)

def steps(number):
    if number < 1:
        raise ValueError("Only positive integers are allowed")
    return steps_recursively(0, number)

def steps_recursively(steps, number):
    return steps if number == 1 else steps_recursively(steps + 1, number / 2 if number % 2 == 0 else 3 * number + 1)
        
