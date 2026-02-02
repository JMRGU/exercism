def is_paired(input_string):
    """Tracking count of parens and list of operations
        Possibly superfluous to do both
        There must be a smarter way of doing this...
    """
    scope = []
    
    for s in input_string:
        if s == '(': scope += [s]
        elif s == ')':
            if len(scope) <= 0: return False
            elif scope[-1] == '(': scope = scope[:-1]
            else: return False
        elif s == '{': scope += [s]
        elif s == '}':
            if len(scope) <= 0: return False
            elif scope[-1] == '{': scope = scope[:-1]
            else: return False
        elif s == '[': scope += [s]
        elif s == ']':
            if len(scope) <= 0: return False
            elif scope[-1] == '[': scope = scope[:-1]
            else: return False
    
    return len(scope) == 0
