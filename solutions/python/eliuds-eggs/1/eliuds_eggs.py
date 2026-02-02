def egg_count(display_value):
    """Convert decimal to binary bistring, then count bits
    (without using existing binary conversion functions)

    Presumably supposed to translate dec->bin manually.

    Came up with a method of bitshifting to find the most-significant bit, counting that bit as another egg, then reducing the remainder by 2^msb-1 and repeating until zero.
    """

    rem = int(display_value)
    egg_count = 0
    
    while rem > 0:
        shift_count = 1
        reduced = rem
        shifting = True
        while shifting:
            if reduced >> shift_count > 0:
                shift_count += 1
            else: shifting = False
        
        egg_count += 1
        rem -= pow(2, shift_count - 1)
        
    return egg_count

    
    

    
    