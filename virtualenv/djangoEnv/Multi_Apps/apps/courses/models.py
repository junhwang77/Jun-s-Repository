from __future__ import unicode_literals
from django.db import models
from ..login_reg.models import Users

class UserManager(models.Manager):
    def user(self):
        users = Users.usermanager.all()
        return(True, users)

    def add_user_to_course(self, data):
        course = self.get(id=data['course'])
        user = Users.usermanager.get(id=data['user'])
        course.account.add(user)
        course.save()

# Create your models here.
class Courses(models.Model):
    name = models.CharField(max_length=100, null=True)
    description = models.TextField(max_length=1000, null=True)
    account = models.ManyToManyField(Users, related_name = "userstocourses")
    created_at = models.DateTimeField(auto_now_add=True, null=True)
    updated_at = models.DateTimeField(auto_now=True, null=True)
    usermanager = UserManager()
