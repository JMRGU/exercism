# Calculate the square of the sums of the first N natural numbers
# SquareOfSum ? Number
SquareOfSum ← |1 ˙×/+⇡₁

# Calculate the sum of the squares of the first N natural numbers
# SumOfSquares ? Number
SumOfSquares ← |1 /+˙×⇡₁

# Calculate the difference between the square of sums and sum of squares
# DifferenceOfSquares ? Number
DifferenceOfSquares ← |1 -⊃(SumOfSquares|SquareOfSum)
