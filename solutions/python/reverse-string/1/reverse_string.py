def reverse(text):
    """The traditional way: explicitly loop through string in reverse using an index ("for i = 0; i < len(text); i++" kind of thing)
    Can do slightly more interestingly as below:
    """

    reversed = ""
    for i in range(1, len(text) + 1):
        reversed += text[i * -1]

    return reversed
