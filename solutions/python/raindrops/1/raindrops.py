def convert(number):
    if not (number % 3 == 0 or number % 5 == 0 or number % 7 == 0): return str(number)
    out = ""
    if number % 3 == 0: out = "Pling"
    if number % 5 == 0: out += "Plang"
    if number % 7 == 0: out += "Plong"
    return out
