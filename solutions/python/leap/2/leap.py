# Using closures, for no particular reason
def leap_year(year):
    check_leap = is_leap_year(year)
    
    return check_leap(4) and not check_leap(100) or check_leap(4) and check_leap(100) and check_leap(400)

def is_leap_year(year):
    def mod_n(divisor):
        return year % divisor == 0
    return mod_n