from animal import Animal
class Dog(Animal):
    def __init__(self):
        super(Dog, self).__init__()
        self.name = 'Dog'
        self.health = 150
    def pet(self):
        self.health += 5
        return self

class Dragon(Animal):
    def __init__(self):
        super(Dragon, self).__init__()
        print 'this is a dragon!'
        self.name = 'Dragon'
        self.health = 170
    def fly(self):
        self.health -= 10
        return self


#Jindo = Dog()
#Jindo.walk().walk().walk().run().run().pet().displayhealth()

Smaug = Dragon()
Smaug.walk().walk().walk().run().run().fly().fly().displayhealth()
