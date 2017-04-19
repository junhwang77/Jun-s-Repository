def draw_stars(x):
    i = 0
    while i < len(x):
        if isinstance( x[i], int):
            print "*" * x[i]
            i += 1
        elif isinstance( x[i], str):
            print x[i][0] * len(x[i])
            i += 1

a = [4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith"]
draw_stars(a)
