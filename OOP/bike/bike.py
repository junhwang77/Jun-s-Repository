import random
class Bike(object):
    def __init__(self, price, max_speed):
        self.price = price
        self.max_speed = max_speed
        self.miles = 0

    def displayInfo(self):
        print "The price is", str(self.price)
        print "The max speed is", str(self.max_speed) + 'mph'
        print "The miles on that bike is", str(self.miles) + ' miles'

    def rides(self):
        print "Riding"
        self.miles += 10
        return self

    def reverse(self):
        print "Reversing"
        if self.miles >= 5:
            self.miles -= 5
        return self

bike1 = Bike(300, 28)
bike1.rides().rides().rides().reverse().displayInfo()

bike2 = Bike(300, 10)
bike2.rides().rides().reverse().reverse().displayInfo()
