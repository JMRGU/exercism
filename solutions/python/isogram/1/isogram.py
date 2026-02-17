def is_isogram(string):
    """Isogram = only unique characters
    Obvious solution: convert to set, check length matches input - must account for punctation being stripped though.
    To do this, need to split input into alphabet + punctuation, then sequence alphabet, then compare sum lengths against input - not ideal
    """

    # len(set([c for c in string.casefold() if c.isalpha()])) == len(string)
    
    # len(set(filter(str.isalpha, string.casefold()))) == len(string) # Works here, but not on my machine, probably version difference

    alphabet = []
    punctuation = []
    for c in string:
        (alphabet if c.isalpha() else punctuation).append(c.casefold())

    return len(set(alphabet)) + len(punctuation) == len(string)