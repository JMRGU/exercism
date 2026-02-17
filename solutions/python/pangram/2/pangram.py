def is_pangram(sentence):
    """Construct map of full alphabet:count
    Pass through input incrementing letter count
    Reduce to minimum count and confirm minimum > 0
    Use range() to construct alphabet and populate dict

    Alternate method: find unique letters in sentence, confirm total == 26 - rather than going char-by-char through sentence, might be a quick way to convert it into a Set, which guarantees uniqueness?
    """

    return len(set(filter(str.isalpha, sentence.casefold()))) == 26
    
    
    