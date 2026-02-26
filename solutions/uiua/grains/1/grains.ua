# The number of grains on a square
# Grains ? Square
Square ← |1 ⍣(˜ⁿ2-1⍤"square must be between 1 and 64"↧⊸⊃(>0|<65))⋅∘

# The total number of grains on the board
# Total ?
Total  ← |0 ⍣(/+ Square ⇡₁64)∘

