import random
import time

def insertionsort(my_list):
    i = 1
    list_len = len(my_list)
    for i in range (list_len):
        if my_list[i] < my_list[i-1]:
            for j in range(i):
                if my_list[j] < my_list[j-1]:
                    my_list[j-1], my_list[j] = my_list[j], my_list[j-1]
                j -= 1
    return my_list

list_rand = [random.randrange(0, 10000)for i in range(1, 101)]

start = time.time()
print(list_rand)
print(insertionsort(list_rand))
end = time.time()
print(end - start)
