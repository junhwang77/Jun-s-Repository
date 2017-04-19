from __future__ import unicode_literals
from django.db import models
from ..login_reg.models import Users
import re, bcrypt

EMAIL_REGEX = re.compile(r'^[a-zA-Z0-9\.\+_-]+@[a-zA-Z0-9\._-]+\.[a-zA-Z]*$')
USER_REGEX = re.compile(r'^[\w.-]+$')

class UserManager(models.Manager):
    def user(self):
        users = Users.usermanager.all()
        return (True, users)

    def registerValid(self, first_name, last_name, email, OrigEmail, description):
        errors = []
        if len(email) == 0:
            errors.append("Email is required")
        elif not EMAIL_REGEX.match(email):
            errors.append("Invalid Email")
        elif len(first_name) < 2:
            errors.append("First name is required")
        elif not USER_REGEX.match(first_name):
            errors.append("Invalid first name")
        elif len(last_name) < 2:
            errors.append("Last name is required")
        elif not USER_REGEX.match(last_name):
            errors.append("Invalid last name")
        elif Users.usermanager.exclude(email=OrigEmail).filter(email=email):
            errors.append("Email already being used")
        if len(errors) is not 0:
            return (False, errors)
        else:
            p = Users.usermanager.get(email=OrigEmail)
            p.first_name = first_name
            p.last_name = last_name
            p.email = email
            p.description = description
            p.save()
            return (True, p)

    def passValid(self, password, pass_conf):
        errors = []
        if len(password) < 8:
            errors.append("Password is required")
        elif password != pass_conf:
            errors.append("Passwords do not match")
        if len(errors) is not 0:
            return (False, errors)
        else:
            pw_hash = bcrypt.hashpw(password.encode(), bcrypt.gensalt())
            e = Users.usermanager.create(pw_hash=pw_hash)
            e.save()
            return (True, e)

# Create your models here.
class Userlevel(models.Model):
    user_level = models.PositiveSmallIntegerField()
    usermanager = UserManager()
