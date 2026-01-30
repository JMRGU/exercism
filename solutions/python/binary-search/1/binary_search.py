def find(search_list, value):
    """The tests don't actually want found/notfound, they want the *position of the item in the original array* which is not necessarily common, and a bit of a pain.

    I don't want to use indexOf() or find() in the end, because that defeats the purpose.

    Idea is to enumerate search_list to track original indices
    """

    # Spot empty list
    if len(search_list) <= 0:
        raise ValueError("value not in array")
    
    # enumerate, swap (index, value) -> (value, index), then sort
    # (sorted() sorts by first elem in list; probably a way to pass it a sorting function to save the swap)
    sorted_list = sorted([(v, i) for (i, v) in enumerate(search_list)])
    
    while len(sorted_list) >= 1:
        if len(sorted_list) == 1:
            if value == sorted_list[0][0]: return sorted_list[0][1]
            else: raise ValueError("value not in array")
        
        mid = int(len(sorted_list) / 2)
        
        if sorted_list[mid][0] == value:
            return sorted_list[mid][1]
        elif sorted_list[mid][0] > value:
            sorted_list = sorted_list[:mid]
        else:
            sorted_list = sorted_list[mid:]
