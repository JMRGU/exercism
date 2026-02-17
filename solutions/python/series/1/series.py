def slices(series, length):
    
    if length == 0:
        raise ValueError("slice length cannot be zero")

    if length < 0:
        raise ValueError("slice length cannot be negative")

    if series == '':
        raise ValueError("series cannot be empty")
    
    if len(series) < length:
        raise ValueError("slice length cannot be greater than series length")

    seq = []

    for i in range(0, len(series) - length + 1):
        seq.append(series[i:i+length])
    
    return seq