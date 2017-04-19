from django.shortcuts import render, HttpResponse
from .models import User

# Create your views here.
def index(request):
    User.UserManager.login("speros@codingdojo.com", "Speros")
    return HttpResponse(User.UserManager.login("speros@codingdojo.com", "Speros"))
