def is_paired(input_string):
    """I had the right idea with the stack, but didn't think to streamline by tracking valid pairs in a dict.

        Also still have to do a length check on the stack, which seems ugly to me.  I'm missing something.
    """
    stack = []
    pairs = {'}': '{', ']': '[', ')': '('}
    
    for s in input_string:
        if s in pairs.values():
            stack += [s]
        elif s in pairs.keys():
            if len(stack) <= 0:
                return False
            else:
                last = stack.pop()
                if last != pairs[s]: return False
    
    return len(stack) == 0
