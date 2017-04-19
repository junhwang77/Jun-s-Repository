from django.shortcuts import render, HttpResponse, redirect

# Create your views here.
def index(request):
    return render(request, "disappearingninjas/index.html")

def show_all(request):
    return render(request, "disappearingninjas/show_all.html")

def show(request, ninja_color):
    blue = ''
    orange = ''
    red = ''
    purple = ''
    nota = ''
    if ninja_color == 'blue':
        orange = 'hidden'
        red = 'hidden'
        purple = 'hidden'
        nota = 'hidden'
    elif ninja_color == 'orange':
        blue = 'hidden'
        red = 'hidden'
        purple = 'hidden'
        nota = 'hidden'
    elif ninja_color == 'red':
        orange = 'hidden'
        blue = 'hidden'
        purple = 'hidden'
        nota = 'hidden'
    elif ninja_color == 'purple':
        orange = 'hidden'
        red = 'hidden'
        blue = 'hidden'
        nota = 'hidden'
    else:
        blue = 'hidden'
        orange = 'hidden'
        red = 'hidden'
        purple = 'hidden'
    context = {
        "blue": blue,
        "orange": orange,
        "red": red,
        "purple": purple,
        "nota": nota
    }
    return render(request, "disappearingninjas/show.html", context)
