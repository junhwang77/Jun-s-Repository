from django.shortcuts import render, HttpResponse, redirect
from . import models
from models import messages
from models import comments
from django.core.urlresolvers import reverse

# Create your views here.
def wall(request, id):
    request.session['first_name'] = request.POST['first_name']
    request.session['last_name'] = request.POST['last_name']
    request.session['id'] = id
    
    context = {

    }
    return render(request, 'thewall/wall.html', context)

def wall(request):
    querym = "SELECT users.first_name, users.last_name, messages.id, messages.message, messages.updated_at FROM messages JOIN users ON users.id=messages.user_id ORDER BY messages.id DESC"
    messages = mysql.query_db(querym)
    queryc = "SELECT users.first_name, users.last_name, comments.updated_at, comments.comment, messages.id, comments.message_id FROM users JOIN comments ON users.id=comments.user_id JOIN messages ON comments.message_id=messages.id"
    comments = mysql.query_db(queryc)
    return render(request, 'thewall/wall.html', all_messages=messages, all_comments=comments)

def login(request):
    email = request.POST['email']
    password = request.POST['password']
    query = "SELECT * FROM users WHERE email = :email LIMIT 1"
    data = { 'email': email }
    user = mysql.query_db(query, data)
    print bool(user)
    if bool(user)==True:
        if bcrypt.check_password_hash(user[0]['pw_hash'], password):
            request.session['user_name'] = user[0]['first_name']
            request.session['user_id'] = user[0]['id']
            return redirect('/wall')
        else:
            messages.login(request, 'Incorrect Email and/or Password')
    else:
        messages.login(request, 'That account does not exist')
    return redirect('/')

def add_message(request):
    if len(request.POST['message']) < 1:
        messages.add_message(request, "Field cannot be blank!")
    else:
        query = "INSERT INTO messages (user_id, message, created_at, updated_at) VALUES (:user_id, :message, NOW(), NOW())"
        data = {
                'message': request.POST['message'],
                'user_id': request.POST['user_id']
        }
        mysql.query_db(query, data)
    return redirect('/wall')

def add_comment(request):
    query = "INSERT INTO comments (message_id, user_id, comment, created_at, updated_at) VALUES (:message_id, :user_id, :comment, NOW(), NOW())"
    data = {
            'comment': request.POST['comment'],
            'user_id': request.POST['user_id'],
            'message_id': request.POST['message_id']
    }
    mysql.query_db(query, data)
    return redirect('/wall')

def destroy(request, id):
    queryc = "DELETE FROM comments WHERE message_id = :id"
    datac = {'id': id}
    mysql.query_db(queryc, datac)
    querym = "DELETE FROM messages WHERE id = :id"
    datam = {'id': id}
    mysql.query_db(querym, datam)
    return redirect('/wall')

def delete(request, id):
    query = "DELETE FROM comments WHERE id = :id"
    data = {'id': id}
    mysql.query_db(query, data)
    return redirect('/wall')

def new(request):
    query = "SELECT * FROM users"
    friends = mysql.query_db(query)
    return render(request, 'register.html')

def create(request):
    if len(request.POST['email']) < 1 or len(request.POST['first_name']) < 1 or len(request.POST['last_name']) < 1 or len(request.POST['password']) < 1 or len(request.POST['confp']) < 1:
        messages.login(request, "All fields are required and must not be blank.", "error")
    elif str.isalpha(str(request.POST['first_name'])) == False and str.isalpha(str(request.POST['last_name'])) == False:
        messages.login(request, "Name fields must contain all alphabetical characters.", "error")
    elif len(request.POST['password']) < 9:
        messages.login(request, "Password should contain more than 8 characters.", "error")
    elif re.search('\d.*[A-Z]|[A-Z].*\d', request.POST['password']) == None:
        messages.login(request, "Password should contain at least 1 uppercase letter and 1 number.")
    elif not EMAIL_REGEX.match(request.POST['email']):
        messages.login(request, "Invalid Email Address.", "error")
    elif request.POST['password'] != request.POST['confp']:
        messages.login(request, "Passwords do not match")
    else:
        password = request.POST['password']
        pw_hash = bcrypt.generate_password_hash(password, 14)
        query = "INSERT INTO users (first_name, last_name, email, pw_hash, created_at, updated_at) VALUES (:first_name, :last_name, :email, :pw_hash, NOW(), NOW())"
        data = {
                 'first_name': request.POST['first_name'],
                 'last_name':  request.POST['last_name'],
                 'email': request.POST['email'],
                 'pw_hash': pw_hash
               }
        mysql.query_db(query, data)
        return render(request, "Registered.html")
    return render(request, 'register.html')
