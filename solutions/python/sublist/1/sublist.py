"""
This exercise stub and the test suite contain several enumerated constants.

Enumerated constants can be done with a NAME assigned to an arbitrary,
but unique value. An integer is traditionally used because it’s memory
efficient.
It is a common practice to export both constants and functions that work with
those constants (ex. the constants in the os, subprocess and re modules).

You can learn more here: https://en.wikipedia.org/wiki/Enumerated_type
"""

""" First solution:
    Enums are intended to be returned as output; gave them generic int values
    Checks:
    (1) if len of lists is equal, check list_one == list_two
    (2) else find shorter list, and check first char of shorter list in longer list
    (3) if it is, check slice of longer list from index == shortlist
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
    
    # Find every index of the first elem of short list in long; foreach: check slice matches
    indices = [i for (i, x) in enumerate(long_list) if x == short_list[0]]
    for idx in indices:
        if short_list == long_list[idx:idx + len(short_list)]:
            return SUPERLIST if super_list else SUBLIST

    # No slice matches: confirmed UNEQUAL
    return UNEQUAL