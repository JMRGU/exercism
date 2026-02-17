# I would use regex for this, but I assume we aren't supposed/able to import modules - meant to work natively
# Note: version of Python used in exercism < 3.10 so lacks pattern matching.  There is otherwise no switch-case in the language, though there are hacks - you are expected to use ifs in general

# This exercise is clearly intended to introduce string methods

def response(hey_bob):
    query = hey_bob.strip()
    # Performing inline checks:
    # if len(query) == 0:
    #     return "Fine. Be that way!"
    # elif query.find("?") == len(query) - 1 and len(query) > 0:
    #     if (query.isupper()): return "Calm down, I know what I'm doing!"
    #     else: return "Sure."
    # elif query.isupper():
    #     return "Whoa, chill out!"
    # else:
    #     return "Whatever."

    # Using functions, not nested:
    if is_silence(query): return "Fine. Be that way!"
    elif is_question(query) and is_shouting(query): return "Calm down, I know what I'm doing!"
    elif is_question(query): return "Sure."
    elif query.isupper(): return "Whoa, chill out!"
    else: return "Whatever."

def is_silence(s):
    return s == ""
    
def is_question(s):
    return s.find("?") == len(s) - 1

def is_shouting(s):
    return s.isupper()