import arithmetic
class MathDojo(object):
    def __init__(self):
        self.value = 0
    def add(self, *tuple):
        self.value += arithmetic.add(self+ ", ".join(tuple))
        return self
    def subtract(self, x, y):
        self.value -= arithmetic.subtract(x, y)
        return self
    def result(self):
        print str(self.value)

MathDojo().add(2).add(2, 5).subtract(3, 2).result()
