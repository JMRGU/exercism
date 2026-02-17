def recite(start_verse, end_verse):
    """line[0] starts 'This is'
    Subsequent lines start 'that' + 'verb' + line

    So dict of 'verb': 'line' then construct based on position
        or really, 2d array
    """
    
    lines = [
        ['', ''],
        ['lay in', 'the house that Jack built.'],
        ['ate', 'the malt'],
        ['killed', 'the rat'],
        ['worried', 'the cat'],
        ['tossed', 'the dog'],
        ['milked', 'the cow with the crumpled horn'],
        ['kissed', 'the maiden all forlorn'],
        ['married', 'the man all tattered and torn'],
        ['woke', 'the priest all shaven and shorn'],
        ['kept', 'the rooster that crowed in the morn'],
        ['belonged to', 'the farmer sowing his corn'],
        ['', 'the horse and the hound and the horn'],
    ]
    
    poem = []
    
    for verse in range(start_verse, end_verse + 1):
        section = []
        for i in range(verse, 0, -1):
            line = " ".join(("This is", lines[i][1])) if i == verse else " ".join(("that", lines[i][0], lines[i][1]))
            section.append(line)
    
        poem.append(" ".join(section))
    
    return poem