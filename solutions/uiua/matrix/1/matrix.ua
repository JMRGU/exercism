ParseMatrix ← (⊜(⊜⋕⊸≠@ )⊸≠@\n)
Extract ← ⊏-1⤚⋅∘

# Parse a row from a matrix
# RowValues ? Matrix RowIndex
Row ← |2 Extract ParseMatrix

# Parse a column from a matrix
# ColumnValues ? Matrix ColumnIndex
Column ← |2 Extract ⤸1 ParseMatrix
