# -*- coding: utf-8 -*-
# Generated by Django 1.10.5 on 2017-02-01 22:40
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('thewall', '0007_auto_20170201_2224'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='comments',
            name='message_id',
        ),
        migrations.AddField(
            model_name='comments',
            name='message_id',
            field=models.ManyToManyField(to='thewall.Messages'),
        ),
    ]
