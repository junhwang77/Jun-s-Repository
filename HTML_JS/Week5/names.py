'''students = [
    {'first_name': 'Michael', 'last_name' : 'Jordan'},
    {'first_name': 'John', 'last_name' : 'Rosales'},
    {'first_name': 'Mark', 'last_name' : 'Guillen'},
    {'first_name': 'KB', 'last_name' : 'Tonel'},
]

for student in students:
    print student['first_name'], student['last_name']
'''

users = {
 'Students': [
     {'first_name':  'Michael', 'last_name' : 'Jordan'},
     {'first_name' : 'John', 'last_name' : 'Rosales'},
     {'first_name' : 'Mark', 'last_name' : 'Guillen'},
     {'first_name' : 'KB', 'last_name' : 'Tonel'}
  ],
 'Instructors': [
     {'first_name' : 'Michael', 'last_name' : 'Choi'},
     {'first_name' : 'Martin', 'last_name' : 'Puryear'}
  ]
 }


for key, data in users.items():
    print key
    for value in data:
        print data.index(value)+1, '-', value['first_name'], value['last_name'], '-', len(value['first_name'])+len(value['last_name'])
