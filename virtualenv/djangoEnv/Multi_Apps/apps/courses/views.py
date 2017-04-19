from django.shortcuts import render, HttpResponse, redirect
from . import models
from models import Courses
from django.core.urlresolvers import reverse
from django.db.models import Count

def index(request):

    courses = models.Courses.usermanager.all()
    context = {
        'courses':courses
    }
    return render(request, 'courses/index.html', context)

def add(request):
    n = Courses(name=request.POST['name'], description=request.POST['description'])
    n.save()
    return redirect(reverse('courses:index'))

def delete(request, id):
    courses = models.Courses.usermanager.get(id=id)
    context = {
        'name':courses.name,
        'description':courses.description,
        'id':courses.id
    }
    return render(request, 'courses/destroy.html', context)

def destroy(request, id):
    d = models.Courses.usermanager.get(id=id)
    d.delete()
    return redirect(reverse('courses:u_c'))

def users_courses(request):
    courses = models.Courses.usermanager.annotate(students=Count('account'))
    users = models.Courses.usermanager.user()
    print courses
    print users
    context = {
        'courses':courses,
        'users':users[1]
    }
    return render(request, 'courses/u_c.html', context)

def makeaccount(request):
    Courses.usermanager.add_user_to_course(request.POST)
    return redirect(reverse('courses:u_c'))
