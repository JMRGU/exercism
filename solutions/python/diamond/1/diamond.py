
def rows(letter):
    """Certainly simpler ways to do this
    """
    alphabet = [chr(i) for i in range(ord('A'), ord('Z') + 1)]

    # Determine midpoint, grid dimensions
    mid = alphabet.index(letter)
    dim = (mid * 2 + 1)
    
    # Build whitespace grid
    diamond = [[" " for _ in range(dim)] for _ in range(dim)]
    
    # Substitute letters in appropriate positions row-by-row
    for i, row in enumerate(diamond):
        
        # Substitute at +- offset from first/last point
        offset = mid - i
        
        # Build out top
        if i <= mid:
            row[offset] = alphabet[i]
            row[-(offset + 1)] = alphabet[i]
        else:
            # Generate bottom: duplicate preceding rows
            diamond[i] = diamond[dim - (i + 1)]

    # return "\n".join(["".join(row) for row in diamond])

    # Exercise wants result as list of rows...
    return ["".join(row) for row in diamond]
