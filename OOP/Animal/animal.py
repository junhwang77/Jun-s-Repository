class Animal(object):
    def __init__(self, name=None):
        print 'its an animal!'
        self.name = name
        self.health = 100
    def walk(self):
        self.health -= 1
        return self
    def run(self):
        self.health -=5
        return self
    def displayhealth(self):
        print str(self.name) + " HP: " + str(self.health)

#animal = Animal('animal')
#animal.walk().walk().walk().run().run().displayhealth()
