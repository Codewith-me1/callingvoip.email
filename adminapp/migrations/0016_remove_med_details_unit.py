# Generated by Django 4.2.5 on 2023-09-21 13:19

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('adminapp', '0015_med_details'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='med_details',
            name='unit',
        ),
    ]
