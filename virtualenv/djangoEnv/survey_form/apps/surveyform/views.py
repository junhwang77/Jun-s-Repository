from django.shortcuts import render, HttpResponse, redirect

def index(request):
    return render(request, "surveyform/index.html")

def process(request):
    request.session['count'] = 0
    if request.method == "POST":
        request.session['count'] = int(request.POST.get('counter', False)) + 1
        request.session['name'] = request.POST['your_name']
        request.session['location'] = request.POST['dojo_location']
        request.session['language'] = request.POST['fav_language']
        request.session['comment'] = request.POST['opt_comment']
        return redirect('/results')
    else:
        return redirect('/')

def result(request):
    return render(request, "surveyform/results.html")

# Create your views here.
