def is_valid(isbn):
    """We want a reduce, which was moved from stdlib to functools library, for some reason

    > Initial isbn length check
    > Go char-by-char
    > Add product of value or 10 and reverse iterator to total if digit/trailing "X"
    > Return False if invalid char found; skip hyphens
    """

    if not valid_input(isbn): return False
        
    sum = 0
    multiplier = 10
    length = len(isbn)
    for (i, c) in enumerate(isbn):
        if not is_valid_char(i, c, length): return False
        if not c == "-":
            sum += get_value(c) * multiplier
            multiplier -= 1
    
    return sum % 11 == 0

def valid_input(isbn):
    return len(isbn.replace("-", "")) == 10

def get_value(c):
    if c == "X":
        return 10
    elif c.isnumeric():
        return int(c)
    else:
        return 0

def is_valid_char(i, c, length):
    return c.isnumeric() or c == "-" or (c == "X" and i == length - 1)