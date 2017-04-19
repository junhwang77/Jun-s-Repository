h = 0
t = 0
while h + t != 5001:
    import random
    random_num = random.random()
    x = round(random_num)
    count = h + t
    if x < 1:
        h += 1
        print "Attempt #" + str(count) + ": Throwing a coin... It's a head!... Got " + str(h) + " head(s) so far and " + str(t) +" tail(s) so far"
    else:
        t += 1
        print "Attempt #" + str(count) + ": Throwing a coin... It's a tail!... Got " + str(h) + " head(s) so far and " + str(t) +" tail(s) so far"

print "Ending the program, thank you!"
