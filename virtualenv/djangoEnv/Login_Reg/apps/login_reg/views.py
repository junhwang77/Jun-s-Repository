from django.shortcuts import render, redirect, HttpResponse
from .models import Users
# Create your views here.
def index(request):
    if not 'errors' in request.session:
        request.session['errors'] = []
    return render (request, 'login_reg/index.html')

def login(request):
    if request.method == "POST":
        result = Users.usermanager.loginValid(request.POST['email'],request.POST['password'])
        if result[0]:
            request.session['first_name'] = result[1].first_name
            request.session.pop('errors')
            return redirect('/success')
        else:
            request.session['errors'] = result[1]
            return redirect('/')
    else:
        return redirect ('/')

def create(request):
    if request.method == "POST":
        result = Users.usermanager.registerValid(request.POST['first_name'], request.POST['last_name'],request.POST['email'], request.POST['password'], request.POST['conf_pw'])
        if result[0]:
            request.session['first_name'] = result[1].first_name
            request.session.pop('errors')
            return redirect('/success')
        else:
            request.session['errors'] = result[1]
            return redirect('/')
    else:
        return redirect ('/')

def success(request):

    return render (request, 'login_reg/success.html', {'first_name': request.session.get('first_name')})
