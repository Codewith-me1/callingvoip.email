# Generated by Django 4.2.5 on 2023-09-21 19:34

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('adminapp', '0021_donor_det_delete_financialinfo'),
    ]

    operations = [
        migrations.DeleteModel(
            name='Donor',
        ),
    ]
