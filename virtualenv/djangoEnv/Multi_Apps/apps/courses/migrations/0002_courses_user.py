# -*- coding: utf-8 -*-
# Generated by Django 1.10.5 on 2017-01-26 01:30
from __future__ import unicode_literals

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('login_reg', '0001_initial'),
        ('courses', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='courses',
            name='user',
            field=models.ForeignKey(default='10', on_delete=django.db.models.deletion.CASCADE, to='login_reg.Users'),
        ),
    ]
