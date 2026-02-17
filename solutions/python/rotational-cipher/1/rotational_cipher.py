def rotate(text, key):
    """Caesar Shift cipher

    Can be done with zip(letters, indices 0-26) but better to treat chars as ASCII ints with ord()
    Just wrap around the appropriate case range - something to do with remainder
    And skip punctuation etc.
    """

    return "".join([encipher_char(c, key) for c in text])
    
def encipher_char(c, key):
    if c.isalpha():
        base = 97 if c.islower() else 65
        return chr((((ord(c) - base) + key) % 26) + base)
    else: return c
    