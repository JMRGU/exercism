# Determine if a year is a leap year
# IsLeapYear ? Year
Leap ← ⍣(1 °[1 0 0]|1 °[1 1 1]|0)=0⊂⊂⊃(◿4|◿100|◿400)
# i.e.
# build results of =0(mod4|mod100|mod400)
# valid case 1) =[1 0 0] i.e. mod4 == 0
# valid case 2) =[1 1 1] i.e. mod4 AND mod100 AND mod400 == 0
