from humans import Human
class Wizard(Human):
    def __init__(self):
        super(Wizard, self).__init__()
        self.intelligence = 10
    def heal(self):
        self.health += 10
        return self
class Ninja(Human):
    def __init__(self):
        super(Ninja, self).__init__()
        self.stealth = 10
    def steal(self):
        self.stealth += 5
        return self
class Samurai(Human):
    def __init__(self):
        super(Samurai, self).__init__()
        self.strength = 10
    def sacrifice(self):
        self.health -= 5
        return self

harry = Wizard()
rain = Ninja()
tom = Samurai()


print harry.health
print rain.health
print tom.health

harry.heal()
print harry.health

rain.steal()
print rain.stealth

tom.sacrifice()
print tom.health
print tom.stealth
