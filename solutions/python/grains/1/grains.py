def square(number):
    if (number < 1 or number > 64):
        raise ValueError("square must be between 1 and 64")
    return 1 if number <= 1 else 2 * square(number - 1)


def total():
    total = 0
    [total := total + square(n) for n in range(1,65)]
    return total
