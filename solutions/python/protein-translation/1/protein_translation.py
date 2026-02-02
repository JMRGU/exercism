def proteins(strand):
    """This (presumably) doesn't take reading frames into account.
    """

    translations = {
        'AUG': 'Methionine',
        'UUU': 'Phenylalanine', 
        'UUC': 'Phenylalanine',
        'UUA': 'Leucine',
        'UUG': 'Leucine',
        'UCU': 'Serine',
        'UCC': 'Serine',
        'UCA': 'Serine',
        'UCG': 'Serine',
        'UAU': 'Tyrosine',
        'UAC': 'Tyrosine',
        'UGU': 'Cysteine',
        'UGC': 'Cysteine',
        'UGG': 'Tryptophan',
        'UAA': 'STOP',
        'UAG': 'STOP',
        'UGA': 'STOP',
    }
    proteins = []
    
    while True and len(strand) > 0:
        curr, strand = strand[:3], strand[3:]
        protein = translations[curr]
        if protein == 'STOP':
            break
        proteins.append(protein)
    
    return proteins
