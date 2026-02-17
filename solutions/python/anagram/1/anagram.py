def find_anagrams(word, candidates):
    anagrams = []
    
    for candidate in candidates:
        if len(word) != len(candidate): continue
        if word.casefold() == candidate.casefold(): continue
    
        # if all([c in word.casefold() for c in candidate.casefold()]): anagrams.append(candidate) # Doesn't take char count into consideration, unfortunately - I wanted to avoid an explicit forloop
    
        valid = True
        for c in candidate.casefold():
            valid = word.casefold().count(c) == candidate.casefold().count(c)
            if not valid: break
    
        if valid: anagrams.append(candidate)

    return anagrams