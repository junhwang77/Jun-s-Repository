from django.shortcuts import render, HttpResponse, redirect
import random
import datetime

now = datetime.datetime.now()
# Create your views here.
def index(request):
    try:
        request.session['goldcount']
    except:
        request.session['goldcount'] = 0

    request.session['farmgold'] = random.randrange(9,21)
    request.session['cavegold'] = random.randrange(4,11)
    request.session['housegold'] = random.randrange(1,6)
    request.session['casinogold'] = random.randrange(-51,51)
    return render(request, "ninjagold/index.html")

def process(request):
    if request.POST['building'] == 'farm':
        request.session['goldcount'] += request.session['farmgold']
        temp = request.session['farmgold']
    elif request.POST['building'] == 'cave':
        request.session['goldcount'] += request.session['cavegold']
        temp = request.session['cavegold']
    elif request.POST['building'] == 'house':
        request.session['goldcount'] += request.session['housegold']
        temp = request.session['housegold']
    elif request.POST['building'] == 'casino':
        if request.session['goldcount'] + request.session['casinogold'] != False:
            request.session['goldcount'] += request.session['casinogold']
        temp = request.session['casinogold']
    else:
        request.session['goldcount'] = 0
        request.session['activities'] = ""
        return redirect('/')
    request.session['activities'] += '\n'+'Earned ' + str(temp) + ' gold(s) from the ' + str(request.POST['building']) + now.strftime("%Y/%m/%d %I:%M %p")

    return redirect('/')
