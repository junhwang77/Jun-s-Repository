# -*- coding: utf-8 -*-
# Generated by Django 1.10.5 on 2017-01-31 00:47
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('login_reg', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='users',
            name='description',
            field=models.TextField(max_length=1000, null=True),
        ),
    ]
