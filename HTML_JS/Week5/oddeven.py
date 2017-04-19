def oddeven(x, y):
    for num in range (x, y+1):
        if num%2 == 0:
            print 'Number is ' + str(num) + '. This is an even number.'
        else:
            print 'Number is ' + str(num) + '. This is an odd number.'

oddeven(1, 2000)
