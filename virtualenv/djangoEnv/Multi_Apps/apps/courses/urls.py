from django.conf.urls import url
from . import views
#from django.contrib import admin

urlpatterns = [
    url(r'^$', views.index, name = 'index'),
    url(r'^add$', views.add, name = 'add'),
    url(r'^delete/(?P<id>\d+)$', views.delete),
    url(r'^destroy/(?P<id>\d+)$', views.destroy),
    url(r'^users_courses$', views.users_courses, name = 'u_c'),
    url(r'^makeaccount$', views.makeaccount, name = 'makeaccount')
]
