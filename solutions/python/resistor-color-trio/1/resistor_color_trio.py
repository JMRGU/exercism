def label(colors):
    """Not happy with this, suspect could be simplified.
    Functional style would be nice - would closures be useful?
    """
    # Colors index
    all_colors = ['black', 'brown', 'red', 'orange', 'yellow', 'green', 'blue', 'violet', 'grey', 'white']
    
    # Validate input (they specifically want extra colours ignored)
    colors = colors[:3]
    
    # Build resistance
    resistance = "".join([str(all_colors.index(c)) for c in colors[:2]])
    print(resistance)
    
    # Reduce to single zero char if value==0
    if int(resistance) == 0:
        resistance = "0"
    
    # Build zeroes
    zeroes = "0" * all_colors.index(colors[-1])
    
    # Append trailing zeroes from resistance, if applicable
    if int(resistance) > 0 and resistance[-1] == "0":
        resistance = resistance[0]
        zeroes += "0"
    
    # Remove leading zeroes from resistance if applicable
    if len(resistance) > 1:
        resistance = resistance.lstrip("0")
        
    # Reduce trailing zeroes and return
    if len(zeroes) > 0:
        if len(zeroes) >= 9:
            return resistance + zeroes[:-9] + " gigaohms"
        if len(zeroes) >= 6:        
            return resistance + zeroes[:-6] + " megaohms"
        elif len(zeroes) >= 3:
            return resistance + zeroes[:-3] + " kiloohms"
    return resistance + zeroes + " ohms"