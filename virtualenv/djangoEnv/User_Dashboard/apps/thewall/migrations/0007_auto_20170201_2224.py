# -*- coding: utf-8 -*-
# Generated by Django 1.10.5 on 2017-02-01 22:24
from __future__ import unicode_literals

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('thewall', '0006_auto_20170201_2216'),
    ]

    operations = [
        migrations.AlterField(
            model_name='comments',
            name='message_id',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, to='thewall.Messages'),
        ),
    ]