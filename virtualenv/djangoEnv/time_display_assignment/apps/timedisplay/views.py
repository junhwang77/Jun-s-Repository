from django.shortcuts import render, HttpResponse
import datetime


def index(request):
    #now = datetime.datetime.now()
    #time = ("%s/%s/%s" % (now.day,now.month,now.year)) + (" %s:%s:%s" % (now.hour,now.month,now.second))

    myDate = {
    'time':datetime.datetime.now()
    }
    return render(request, 'timedisplay/page.html', myDate)

# Create your views here.
