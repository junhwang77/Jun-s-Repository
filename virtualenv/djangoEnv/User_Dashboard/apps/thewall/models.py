from __future__ import unicode_literals
from django.db import models
from ..login_reg.models import Users
# Create your models here.

class UserManager(models.Manager):
    def user(self):
        users = Users.usermanager.all()
        return(users)

    def add_message_to_user(self, message, logged_id, id):
        m = Messages(message = message)
        m.save()
        mes = self.get(id=m.id)
        user =Users.usermanager.get(id=logged_id)
        mes.user_id.add(user)
        master =Users.usermanager.get(id=id)
        mes.master_id.add(master)
        mes.save()

    def add_comment_to_message(self, comment, logged_id, mes_id):
        c = Comments(comment = comment)
        c.save()
        com = self.get(id=c.id)
        user = Users.usermanager.get(id=logged_id)
        com.user_id.add(user)
        mes = Messages.usermanager.get(id=mes_id)
        com.message_id.add(mes)
        com.save()

class Messages(models.Model):
    master_id = models.ManyToManyField(Users, related_name = 'masterofmessage')
    user_id = models.ManyToManyField(Users, related_name = 'userofmessage')
    message = models.TextField(max_length=1000, null=True)
    created_at = models.DateTimeField(auto_now_add = True, null=True)
    updated_at = models.DateTimeField(auto_now = True, null=True)
    usermanager = UserManager()

class Comments(models.Model):
    message_id = models.ManyToManyField(Messages, related_name = 'messagecomment')
    user_id = models.ManyToManyField(Users, related_name = 'usercomment')
    comment = models.TextField(max_length=1000, null=True)
    created_at = models.DateTimeField(auto_now_add = True, null=True)
    updated_at = models.DateTimeField(auto_now = True, null=True)
    usermanager = UserManager()
