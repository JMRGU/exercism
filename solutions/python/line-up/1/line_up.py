def line_up(name, number):
    """As usual, I feel like there's a clever way to do this, but I'll do it the obvious way to start
    (Bitwise?)
    (Dict?)

    Just going to strip last two digits first (the obvious way), then look into methods
    """
    snum = str(number)[-2:]
    suffix = "th"
    if (len(snum) == 2 and snum[0] != "1") or len(snum) == 1:
        suffix = "st" if snum[-1] == "1" else "nd" if snum[-1] == "2" else "rd" if snum[-1] == "3" else "th"
    
    return f'{name}, you are the {number}{suffix} customer we serve today. Thank you!'
