from django.shortcuts import render, HttpResponse, redirect
from . import models
from models import Messages
from models import Comments
from django.core.urlresolvers import reverse

# Create your views here.
def wall(request, id):
    if request.method == "POST":
        request.session['first_name']=request.POST['first_name']
        request.session['last_name']=request.POST['last_name']
        request.session['logged_name']=request.POST['logged_name']
        request.session['logged_id']=request.POST['logged_id']
        request.session['id'] = id


    messages = models.Messages.usermanager.filter(master_id=id)
    users = models.Messages.usermanager.user()
    comments = models.Comments.usermanager.all()
    print users
    print messages
    print comments.filter(message_id=40)
    context = {
        'messages':messages,
        'users':users,
        'comments':comments
    }
    return render(request, 'thewall/index.html', context)


def add_message(request, id):
    if len(request.POST['mes']) > 1:
        Messages.usermanager.add_message_to_user(request.POST['mes'], request.POST['logged_id'], id)
    return redirect(reverse('thewall:wall', kwargs={'id': id }))

def add_comment(request, id):
    if len(request.POST['comment']) > 1:
        Comments.usermanager.add_comment_to_message(request.POST['comment'], request.POST['logged_id'], request.POST['mes_id'])
    return redirect(reverse('thewall:wall', kwargs={'id': id}))

def destroy(request, id):
    b = models.Comments.usermanager.filter(message_id=request.POST['mes_id'])
    b.delete()
    d = models.Messages.usermanager.get(id=request.POST['mes_id'])
    d.delete()
    return redirect(reverse('thewall:wall', kwargs={'id': id}))

def delete(request, id):
    query = "DELETE FROM comments WHERE id = :id"
    data = {'id': id}
    mysql.query_db(query, data)
    return redirect('/wall')

def new(request):
    query = "SELECT * FROM users"
    friends = mysql.query_db(query)
    return render(request, 'register.html')
