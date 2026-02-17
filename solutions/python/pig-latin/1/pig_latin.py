# Lots of string shuffling
# Perfect for piping, but alas

# Two options to start with:
#    1) use lots of .find()s to test rules directly
#    2) compose tests into functions and stream chars one-by-one through them

# This I would pattern match on, ideally


def translate(text):
    """Translate Eng->Pig Latin

        Rule #1:
            begins with [vowel/xr/yt]
            -> append "ay"
        Rule #2:
            begins with n>0 consonants
            -> move consonant seq to tail
            -> append "ay"
        Rule #3:
            begins with n>=0 consonants then [qu]
            -> move consonant seq inc. "qu" to tail
            -> append ay
        Rule #4:
            begins with n>0 consonants then [y]
            -> move consonant seq to tail
            -> append "ay"

        Rules #2 & #3 can be combined, all can be composed with "add 'ay'" operation
        How is #4 different to #2?
    """

    out = []
    
    for w in text.split(" "):
        
        inp = w # internal operation to avoid mutating iter object
        rem = ""
        word = ""
        vowels = ("a", "e", "i", "o", "u", "xr", "yt")
    
        if text.startswith(vowels):
            word = text + "ay"
            return word
    
        for i, c in enumerate(text): # index didn't end up required; keeping for posterity
            # check inp[i].startswith(option)
            if inp.startswith(vowels):
                word = inp + rem + "ay"
                break
            if inp.startswith("qu"):
                word = inp[2:] + rem + "quay"
                break
            elif inp.startswith("y") and len(rem) > 0:
                word = inp + rem + "ay"
                break
            else:
                # moving to next iter
                rem += inp[0]
                inp = inp[1:] # strip first char
        
        out.append(word)

    return " ".join(out)
