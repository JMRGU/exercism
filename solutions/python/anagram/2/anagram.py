def valid_char(c, word, candidate):
    return c in word and word.count(c) == candidate.count(c)

def find_anagrams(word, candidates):
    anagrams = []
    
    for candidate in candidates:
        if len(word) != len(candidate): continue
        if word.casefold() == candidate.casefold(): continue
    
        if all([valid_char(c, word.casefold(), candidate.casefold()) for c in candidate.casefold()]): anagrams.append(candidate)

    return anagrams