# -*- coding: utf-8 -*-
# Generated by Django 1.10.5 on 2017-01-27 21:56
from __future__ import unicode_literals

from django.db import migrations
import django.db.models.manager


class Migration(migrations.Migration):

    dependencies = [
        ('courses', '0006_auto_20170127_0139'),
    ]

    operations = [
        migrations.AlterModelManagers(
            name='courses',
            managers=[
                ('usermanager', django.db.models.manager.Manager()),
            ],
        ),
        migrations.RemoveField(
            model_name='courses',
            name='account',
        ),
    ]
