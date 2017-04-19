from django.conf.urls import url, include
from . import views

urlpatterns = [
    url(r'^wall/(?P<id>\d+)$', views.wall, name = 'wall'),
    url(r'^post/(?P<id>\d+)$', views.add_message, name = 'add_message'),
    url(r'^comment/(?P<id>\d+)$', views.add_comment, name = 'add_comment'),
    url(r'^destroy/(?P<id>\d+)$', views.destroy, name = 'destroy')
]
