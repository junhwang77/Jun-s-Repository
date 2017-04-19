from __future__ import unicode_literals
from django.db import models
from ..login_reg.models import Users
# Create your models here.

class messages(models.Model):
    user_id = models.ManyToManyField(Users, related_name = 'usermessage')
    message = models.TextField(max_length=1000)
    created_at = models.DateTimeField(auto_now_add = True)
    updated_at = models.DateTimeField(auto_now = True)

class comments(models.Model):
    message_id = models.ForeignKey(messages)
    user_id = models.ManyToManyField(Users, related_name = 'usercomment')
    comment = models.TextField(max_length=1000)
    created_at = models.DateTimeField(auto_now_add = True)
    updated_at = models.DateTimeField(auto_now = True)
