# While we could just create a list of colours since their codes match regular list indices, I think it's better practice to pretend that the codes would be more meaningful
# (I refuse to use American spelling)

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
    "white"]

colour_codes = dict(zip(colours, range(0, 10)))

def color_code(color):
    return colour_codes[color]

def colors():
    # .keys() prefixes "dict_keys" to output for Pythonic reasons
    return [k for k in colour_codes.keys()]
