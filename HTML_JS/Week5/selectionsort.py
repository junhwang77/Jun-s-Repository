import time
import random

def selectionsort(list):
    for i in range(len(list) - 1):
        for j in range(len(list) - 1):
            if x[j] == min(list[i:]):
                list[i], list[j] = list[j], list[i]
    return list

x = [random.randrange(0, 10000)for i in range(1, 101)]

start = time.time()
print(x)
print(selectionsort(x))
end = time.time()
print(end - start)
