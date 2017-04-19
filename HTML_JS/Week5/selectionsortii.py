import time
import random

def selectionsort(my_list):
    len_list = len(my_list)
    for i in range(len_list):
        min_index = i
        for j in range(i+1, len_list):
            if my_list[j] < my_list[min_index]:
                min_index = j
        if min_index != i:
                my_list[i], my_list[min_index] = my_list[min_index], my_list[i]
    return my_list

x = [random.randrange(0, 10000)for i in range(1, 101)]

start = time.time()
print(x)
print(selectionsort(x))
end = time.time()
print(end - start)
