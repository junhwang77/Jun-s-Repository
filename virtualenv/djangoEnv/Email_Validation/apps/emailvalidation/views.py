from django.shortcuts import render, redirect, HttpResponse
from .models import Email
# Create your views here.
def index(request):
    if not 'errors' in request.session:
        request.session['errors'] = []
    return render(request, "emailvalidation/index.html")

def create(request):
    if request.method == "POST":
        result = Email.emailmanager.register(request.POST['email'])
        if result[0]:
            request.session['email'] = result[1].email
            request.session.pop('errors')
            return redirect('/success')
        else:
            request.session['errors'] = result[1]
            return redirect('/')
    else:
        return redirect ('/')

def success(request):
    email = Email.emailmanager.all()
    return render (request, 'emails/success.html', {'emails': emails, 'your_email': request.session.get('email')})

def destroy(request, id):
    result = Email.emailmanager.destroy(id)
    if result[0]:
        return redirect('/success')
    else:
        print result[1]
