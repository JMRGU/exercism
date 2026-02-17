def is_pangram(sentence):
    """Construct map of full alphabet:count
    Pass through input incrementing letter count
    Reduce to minimum count and confirm minimum > 0
    Use range() to construct alphabet and populate dict

    Alternate method: find unique letters in sentence, confirm total == 26 - rather than going char-by-char through sentence, might be a quick way to convert it into a Set, which guarantees uniqueness?
    """

    alphabet = {chr(c): 0 for c in range(97, 123)}
    
    for c in sentence.casefold():
        found = alphabet.get(c)
        if found != None:
            alphabet[c] += 1
        # alphabet[c] += 1 if alphabet.get(c) != None else "" # Fun fact: this gives KeyError, indicating that alphabet[c] evaluates first in this expression, not last
    
    return min(alphabet.values()) > 0
    