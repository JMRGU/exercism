def to_rna(dna_strand):
    """Dict to map DNA:RNA seems straightforward
    """

    maps = {
        'G': 'C',
        'C': 'G',
        'T': 'A',
        'A': 'U'
    }

    return "".join([maps[d] for d in dna_strand])