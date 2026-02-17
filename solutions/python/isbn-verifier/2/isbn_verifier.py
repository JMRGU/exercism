def is_valid(isbn):
    """We want a reduce, which was moved from stdlib to functools library, for some reason

    > Initial isbn length check
    > Go char-by-char
    > Add product of value or 10 and reverse iterator to total if digit/trailing "X"
    > Return False if invalid char found; skip hyphens
    """

    # Better ISBN Validator (stolen from a glance at some guy's better solution)
# More how I wanted to do it originally, albeit failed
    
    digits = list([c for c in isbn.replace("-", "")])
    if not len(digits) == 10: return False
    if digits[-1] == "X": digits[-1] = "10"
        
    # Validity check: length, all are numeric
    if not (len(digits) == 10 and "".join(digits).isnumeric()): return False

    total = sum([(int(d) * i) for (d, i) in  zip(digits, range(10, 0, -1))])
    
    return total % 11 == 0