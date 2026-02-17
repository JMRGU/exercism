def resistor_label(colors):
    """
    """
    # List of colours, and dict of tolerances
    all_colors = ['black', 'brown', 'red', 'orange', 'yellow', 'green', 'blue', 'violet', 'grey', 'white']
    tolerances = {'grey': 0.05, 'violet': 0.1, 'blue': 0.25, 'green': 0.5, 'brown': 1, 'red': 2, 'gold': 5, 'silver': 10}

    # one-value input - simply resistance, no precision, no tolerance
    if len(colors) < 3:
        return str(all_colors.index(colors[0])) + " ohms"
    
    # three- or four-value input
    digits = colors[:2] if len(colors) == 4 else colors[:3]
    multiplier = colors[-2]
    tolerance = str(tolerances[colors[-1]]) + "%"
    
    # Translate resistance and produce w/multiplier
    digits = "".join([str(all_colors.index(c)) for c in digits])
    resistance = int(digits) * 10 ** int(all_colors.index(multiplier))
    
    # Reduce resistance for proper suffix and return (formatted x.0->x)
    suffix = ""
    if resistance // 1000000000 > 0:
        return '{:g}'.format(resistance / 1000000000) + " gigaohms ±" + tolerance
    elif resistance // 1000000 > 0:
        return '{:g}'.format(resistance / 1000000) + " megaohms ±" + tolerance
    elif resistance // 1000 > 0:
        return '{:g}'.format(resistance / 1000) + " kiloohms ±" + tolerance
    else:
        return '{:g}'.format(resistance) + " ohms ±" + tolerance