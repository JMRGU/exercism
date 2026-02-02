def egg_count(display_value):
    """Convert decimal to binary bistring, then count bits
    (without using existing binary conversion functions)

    Had a look at the community solutions.
    Lots of bin(display_value) despite the instructions.

    Somebody just reduced the display_value by 2 to find the remainder, liked that so will replicate... but different.

    Provided a generator to gradually divide by two down, then find remainder of mod2 against each step
    """

    def div_two(div):
        yield div
        while div > 0:
            div //= 2
            yield div

    eggs = [x % 2 for x in div_two(display_value)]

    return eggs.count(1)

    

    
    

    
    