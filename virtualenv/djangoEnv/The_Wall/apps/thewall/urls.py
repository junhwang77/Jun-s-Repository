from django.conf.urls import url, include
from . import views

urlpatterns = [
    url(r'^wall/(?P<id>\d+)$', views.wall, name = 'wall'),
]
