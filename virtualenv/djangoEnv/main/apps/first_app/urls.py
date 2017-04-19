from django.conf.urls import url
from . import views

# MVC
# Models -- views -- Templates(controller)

urlpatterns = [
    url(r'^$', views.index),
    url(r'^users$', views.show),
    url(r'^new_user$', views.create)
]
