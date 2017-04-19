count = 0
grades = []
i = 0
while count < 11:
    response = raw_input("Please enter score (0-100): ")
    grades.append(response)
    count += 1
print "Scores and Grades"
while i < len(grades):
    grades[i] = int(grades[i])
    if grades[i] >= 60 and grades[i] <= 69:
        print "Score: " + str(grades[i]) + "; Your grade is D"
    elif grades[i] >= 70 and grades[i] <= 79:
        print "Score: " + str(grades[i]) + "; Your grade is C"
    elif grades[i] >= 80 and grades[i] <= 89:
        print "Score: " + str(grades[i]) + "; Your grade is B"
    elif grades[i] >= 90 and grades[i] <= 100:
        print "Score: " + str(grades[i]) + "; Your grade is A"
    else:
        print "Your grade is an F"
    i += 1
print "End of the Program. Bye!"
