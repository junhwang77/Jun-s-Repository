from django.conf.urls import url
from . import views
#from django.contrib import admin

urlpatterns = [
    url(r'^$', views.index),
    url(r'^ninjas$', views.show_all),
    url(r'^ninjas/(?P<ninja_color>.*)$', views.show)
]
