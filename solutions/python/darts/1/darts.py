def score(x, y):
    """Can do by either lots of if and checks (e.g. if x > 10 and y > 10, 0 points) or finding the length of the hypoteneuse via Pythagoras' theorem.  Going with the latter.
    """

    dist = (x**2 + y**2) ** (1/2) # Shorthand primitive for pow()

    if dist > 10:
        return 0
    elif dist > 5:
        return 1
    elif dist > 1:
        return 5
    else:
        return 10

    
    
