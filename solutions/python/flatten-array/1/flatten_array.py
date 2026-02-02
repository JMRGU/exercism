def flatten(iterable):
    """I felt like this would be straightforward, done recursively, but it took a while to get this working for whatever reason.
    Ends up being I think a closure, but I'm possibly abusing python scope rules.
    """
    
    def exl(lst, acc):
        
        for x in lst:
            if type(x) == list:
                acc = exl(x, acc)
            elif x == None:
                pass
            else:
                acc.append(x)
                
        return acc

    return exl(iterable, [])     
