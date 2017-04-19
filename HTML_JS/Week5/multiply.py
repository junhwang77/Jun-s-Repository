def multiply(x, y):
    i = 0
    z = []
    while i < len(x):
        t = x[i] * y
        z.append(t)
        i += 1
    return z

a = [2,4,10,16]
b = multiply(a, 5)
print b
