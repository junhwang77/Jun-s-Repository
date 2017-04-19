# -*- coding: utf-8 -*-
# Generated by Django 1.10.5 on 2017-01-31 22:32
from __future__ import unicode_literals

from django.db import migrations, models
import django.db.models.deletion
import django.db.models.manager


class Migration(migrations.Migration):

    initial = True

    dependencies = [
        ('login_reg', '0002_users_description'),
    ]

    operations = [
        migrations.CreateModel(
            name='Comments',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('comment', models.TextField(max_length=1000)),
                ('created_at', models.DateTimeField(auto_now_add=True)),
                ('updated_at', models.DateTimeField(auto_now=True)),
            ],
        ),
        migrations.CreateModel(
            name='Messages',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('message', models.TextField(max_length=1000)),
                ('created_at', models.DateTimeField(auto_now_add=True)),
                ('updated_at', models.DateTimeField(auto_now=True)),
                ('master_id', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='masterofmessage', to='login_reg.Users')),
                ('user_id', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='userofmessage', to='login_reg.Users')),
            ],
            managers=[
                ('usermanager', django.db.models.manager.Manager()),
            ],
        ),
        migrations.AddField(
            model_name='comments',
            name='message_id',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='thewall.Messages'),
        ),
        migrations.AddField(
            model_name='comments',
            name='user_id',
            field=models.ManyToManyField(related_name='usercomment', to='login_reg.Users'),
        ),
    ]