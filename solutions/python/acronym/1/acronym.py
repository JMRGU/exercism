def abbreviate(words):
    """Strip all but alpha, replace hyphens w/space, titlecase and strip 0th char
    """

    titled = "".join([w if w.isalpha() else " " if (w == "-" or w == " ") else "" for w in words]).title()
    return "".join([w[0] for w in titled.split()])
    
    
