# Again, we pretend the codes don't match directly to list indices, and create a dict out of them, as if they were more complex

colours = [
    "black",
    "brown",
    "red",
    "orange",
    "yellow",
    "green",
    "blue",
    "violet",
    "grey",
    "white"
]

colour_codes = dict(zip(colours, range(0, 10)))

def value(colors):
    # Concatenate codes of first two colors
    return int("".join([str(colour_codes[color]) for color in colors])[:2])
