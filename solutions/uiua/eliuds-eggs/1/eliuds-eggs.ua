# Decode the number of eggs from its encoded value
# EggCount ? EncodedEggCount
EggCount ← |1 /↥⦷ "1" °⋕₂
# unparse to base2
# mask for "1"s
# find highest value in mask (i.e. count)
