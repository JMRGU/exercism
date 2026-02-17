def commands(binary_str):

    actions = ['wink', 'double blink', 'close your eyes', 'jump', 'reverse']

    handshake = []
    
    for i, b in enumerate(binary_str[::-1]):
        if i == 4 and b == "1": handshake.reverse()
        elif b == "1":
            handshake.append(actions[i])

    return handshake
