from django.shortcuts import render, redirect
import string
import random

def index(request):
    return render(request, "randomword/index.html")

def create(request):
    size=14
    chars=string.ascii_uppercase + string.digits
    request.session['count'] = 0
    if request.method == "POST":
        request.session['randomword'] = ''.join(random.choice(chars) for _ in range(size))
        request.session['count'] = int(request.POST['counter']) + 1
        return redirect('/')
    else:
        return redirect('/')
