def is_armstrong_number(number):
    """Armstrong number: 'a number that is the sum of its own digits each raised to the power of the number of digits'

    Get string representation of number
    Find the exponent (the length of the string)
    Find the sum of each digit raised to the exponent
    Check sum against number
    """
    rep = str(number)
    exp = int(len(rep))

    total = 0
    [total := total + int(c)**exp for c in rep]

    return total == number
