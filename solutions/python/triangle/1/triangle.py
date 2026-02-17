def is_triangle(sides):
    a = sides[0]
    b = sides[1]
    c = sides[2]
    return ((a,b,c) > (0,0,0)) and (a + b >= c and b + c >= a and a + c >= b)

def equilateral(sides):
    is_equilateral = True
    first = sides[0]
    for s in sides[1:]:
        if first != s: is_equilateral = False
    return is_triangle(sides) and is_equilateral

def total(sides):
    total = 0
    for s in sides:
        total += s
    return total

def isosceles(sides):
    return is_triangle(sides) and (sides[0] == sides[1] or sides[1] == sides[2] or sides[0] == sides[2])

def true_isosceles(sides):
    """Deliberately cheeky method
    Sort desc first then compare the 0th element with the 1th and 2th (XOR)

    Note: in this exercise, we say an isosceles triangle has AT LEAST two sides of same length, so this doesn't work
    """
    sides.sort(reverse=True)
    return (sides[0] == sides[1]) ^ (sides[0] == sides[2])


def scalene(sides):
    return is_triangle(sides) and sides[0] != sides[1] and sides[1] != sides[2] and sides[0] != sides[2]