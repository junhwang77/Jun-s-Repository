from django.shortcuts import render, HttpResponse, redirect
from . import models
from models import Userlevel
from django.core.urlresolvers import reverse
# Create your views here.
def index(request):
    users = models.Userlevel.usermanager.user()
    context = {
        'users':users[1]
    }
    return render(request, 'semirestful/index.html', context)

def new(request):
    return render(request, 'semirestful/new.html')

def edit(request, id):
    user = models.Userlevel.usermanager.user()
    print user
    user1 = user[1]
    print user1
    user2 = user1[int(id)-1]
    print user2
    context = {
        'id':user2.id,
        'first_name':user2.first_name,
        'last_name':user2.last_name,
        'email':user2.email,
        'description':user2.description
    }
    return render(request, 'semirestful/edit.html', context)

def create(request):
    c = Product(name=request.POST['name'], description=request.POST['description'], price=request.POST['price'])
    c.save()
    return redirect('/')

def update(request, id):
    if request.method == "POST":
        result = models.Userlevel.usermanager.registerValid(request.POST['first_name'], request.POST['last_name'], request.POST['email'], request.POST['OrigEmail'], request.POST['description'])
        if result[0]:
            request.session.pop('errors')
            return redirect(reverse('semirestful:index'))
        else:
            request.session['errors'] = result[1]
            return redirect(reverse('semirestful:edit', kwargs={'id':id}))
    else:
        return redirect ('semirestful:index')

def destroy(request, id):
    d = models.Product.objects.get(id=id)
    d.delete()
    return redirect('/')
