# These tests are auto-generated with test data from:
# https://github.com/exercism/problem-specifications/tree/main/exercises/all-your-base/canonical-data.json
# File last updated on 2023-07-20
import unittest


def to_base_10(input_base, digits):
    """Translate to base10 via forming expression and eval()uating
    This is my second method: the first to_base_10() was more straightforward, but I wanted to use eval()
    """
    eval_qry = []
    for (i, d) in enumerate(digits):
        eval_qry.append(f'{d} * pow({input_base}, {len(digits) - i - 1})')
    return eval(" + ".join(eval_qry))


def max_exp(total, output_base):
    
    exp = 0
    while pow(output_base, exp) < total:
        exp += 1
    return exp - 1 # Final power whose maximum falls within the total


def to_base_n(digits, output_base):
    """I would love to figure out the smart way to do this from first principles
    But no matter how I think about it, we need to decompose a total into quotients of the powers
    """
    
    total = int(digits)
    exp = max_exp(total, output_base)
    result = []
    
    # Handle zeroes
    if total == 0:
        return [0]
    
    for x in range(exp, -1, -1):
        if total == 0:
            result.append(0)
            continue
        digit = total // pow(output_base, x) # Take quotient of this power of base
        result.append(digit)
        total -= digit * pow(output_base, x) # Reduce total by the quotient to the selected power of base
        
    return result
    
    
def validate_input_base(input_base):
        
    if input_base < 2:
        raise ValueError('input base must be >= 2')

        
def validate_digits(input_base, digits):
    
    # if sum(digits) < 0: # Ended up going digitwise anyway, shame
    
    # Confirm all digits within correct bounds
    for d in digits:
        if d >= input_base or d < 0:
            raise ValueError('all digits must satisfy 0 <= d < input base')


def validate_output_base(output_base):
    
    # Test valid output_base
    if output_base < 2:
        raise ValueError('output base must be >= 2')
            

def validate(input_base, digits, output_base):
    
    validate_input_base(input_base)
    validate_digits(input_base, digits)
    validate_output_base(output_base)
    

def rebase(input_base, digits, output_base):
    
    # Spun off validations into their own functions to keep this a little cleaner
    validate(input_base, digits, output_base)
    
    # Empty digits
    if len(digits) < 1:
        return [0]

    # Capture input in base10 if not already
    base_10 = "".join(map(str, digits)) if input_base == 10 else str(to_base_10(input_base, digits))

    # Return base10 if requested
    if output_base == 10:
        return list(map(int, base_10))

    # Translate to baseN
    result = to_base_n(base_10, output_base)
    
    # Output required as list of ints
    # return list(map(int, result)) 
    return result