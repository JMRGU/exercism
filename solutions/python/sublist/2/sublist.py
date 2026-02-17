"""
This exercise stub and the test suite contain several enumerated constants.

Enumerated constants can be done with a NAME assigned to an arbitrary,
but unique value. An integer is traditionally used because it’s memory
efficient.
It is a common practice to export both constants and functions that work with
those constants (ex. the constants in the os, subprocess and re modules).

You can learn more here: https://en.wikipedia.org/wiki/Enumerated_type
"""

""" Had a look at the top community solution
    Obvious to have a function which compares two lists, and pass the lists one then the other.
    Method of chunking occurred to me which reuses some of my original method so I'll do that now, then probably the function method after
"""


# Possible sublist categories.
# Change the values as you see fit.
SUBLIST = 0
SUPERLIST = 1
EQUAL = 2
UNEQUAL = 3


def sublist(list_one, list_two):
    if list_one == list_two: return EQUAL
    if len(list_one) == len(list_two): return UNEQUAL # If lens are equal at this point: cannot be a sublist
    
    # Determine shorter list and direction
    short_list, long_list, super_list = ((list_one, list_two, False) if len(list_one) < len(list_two) else (list_two, list_one, True))

    if len(short_list) == 0:
        return SUPERLIST if super_list else SUBLIST
    
    
    # Split list into chunks of len(short_list), from each elem?
    chunks = [long_list[i:i + len(short_list)] for (i, x) in enumerate(long_list)]
    
    # Check equality against each
    for chunk in chunks:
        if short_list == chunk:
            return SUPERLIST if super_list else SUBLIST

    # No slice matches: confirmed UNEQUAL
    return UNEQUAL