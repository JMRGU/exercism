# Construct {alphabet : reversed alphabet} dict
alphabet = {chr(k):chr(v) for k, v in zip(range(97, 123), range(122, 96, -1))}
cipher_alphabet = {v:k for (k, v) in zip(alphabet.keys(), alphabet.values())}

def encode(plain_text):
    cipher = "".join([alphabet[p] if p.isalpha() else p if p.isdigit() else "" for p in plain_text.casefold()])
    
    return " ".join([cipher[i:i+5] for i in range(0, len(cipher), 5)])

    
def decode(ciphered_text):
    return "".join([cipher_alphabet[c] if c.isalpha() else c if c.isdigit() else "" for c in ciphered_text.casefold()])
    
