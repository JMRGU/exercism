def square_root(number):
    """First attempt, without looking anything up:
        Lazy generator that loops until it finds the root
    """

    def next_root(start = 0):
        n = start
        while True:
            yield n
            n += 1

    root_gen = next_root()
    root = next(root_gen)
    while root * root < number:
        root = next(root_gen)

    return root
