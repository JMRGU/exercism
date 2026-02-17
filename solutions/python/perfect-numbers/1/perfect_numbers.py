def classify(number):
    """ A perfect number equals the sum of its positive divisors.

    :param number: int a positive integer
    :return: str the classification of the input integer
    """

    # Confirm valid number (0 < number)
    if number < 1:
        raise ValueError("Classification is only possible for positive integers.")
    
    # Calculate Aliquot Sum by testing every increment
    aliquot_sum = 0
    for i in range(1,number):
        aliquot_sum += i if number % i == 0 else 0
    
    if aliquot_sum == number:
        return "perfect"
    elif aliquot_sum > number:
        return "abundant"
    else:
        return "deficient"
    
