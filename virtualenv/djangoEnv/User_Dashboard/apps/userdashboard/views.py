from django.shortcuts import render, HttpResponse, redirect
from . import models
from django.core.urlresolvers import reverse

# Create your views here.
def index(request):
    return render(request, 'userdashboard/index.html')
