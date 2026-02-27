# Count the four nucleotides in a DNA string
# String ? Map
NucleotideCounts ← map "ACGT" ⍤"invalid nucleotide in strand"=/+⤚⊙⧻ ≡/+ ⊸⊞⦷"ACGT"
# tablewise mask
# -> rowwise sumreduce for counts 
# -> assert total (count of "ACGT") matches arg length
# -> map and return
