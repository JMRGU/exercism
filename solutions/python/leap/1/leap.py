# Seems ripe for closures..?
def leap_year(year):
    return div4(year) and not div100(year) or div4(year) and div100(year) and div400(year)

def div4(year):
    return year % 4 == 0

def div100(year):
    return year % 100 == 0

def div400(year):
    return year % 400 == 0