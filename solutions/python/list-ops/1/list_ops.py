def append(list1, list2):
    return list1 + list2


def concat(lists):
    out = []
    for l in lists:
        out += l
    return out


def filter(function, list):
    """Could do recursively
    """
    out = []
    for l in list:
        if function(l): out += [l]
    return out


def length(list):
    count = 0
    for l in list:
        count += 1
    return count


def map(function, list):
    out = []
    for l in list:
        out += [function(l)]
    return out


def foldl(function, list, initial):
    """Aka reduce
    """
    for l in list:
        initial = function(initial, l)
    return initial
    

def foldr(function, list, initial):
    return foldl(function, reversed(list), initial)
    # Hm, I've used reversed() here, before I've defined it below.  So either I implement logic to reverse here, and then again below; or I switch the order of foldr() and reverse() so that I can use reverse() here, or I just use reversed(), since this is just an exercise.


def reverse(list):
    out = []
    for i in range(len(list) - 1, -1, -1):
        out += [list[i]]
    return out
