from django.conf.urls import url, include
from . import views
#from django.contrib import admin

urlpatterns = [
    url(r'^$', views.index),
    url(r'^login$', views.login),
    url(r'^create$', views.create),
    url(r'^success$', views.success)
]
