# Generated by Django 4.2.5 on 2023-09-21 11:53

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('adminapp', '0011_symtopms'),
    ]

    operations = [
        migrations.CreateModel(
            name='Medicine',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=255)),
                ('category', models.CharField(max_length=255)),
                ('company', models.CharField(max_length=255)),
                ('composition', models.CharField(max_length=255)),
                ('group', models.CharField(max_length=255)),
                ('unit', models.CharField(max_length=255)),
                ('min_level', models.DecimalField(blank=True, decimal_places=2, max_digits=10, null=True)),
                ('reorder_level', models.DecimalField(blank=True, decimal_places=2, max_digits=10, null=True)),
                ('tax', models.DecimalField(blank=True, decimal_places=2, max_digits=5, null=True)),
                ('unit_packing', models.CharField(max_length=255)),
                ('vat_account', models.CharField(blank=True, max_length=255, null=True)),
                ('note', models.TextField(blank=True, null=True)),
                ('medicine_photo', models.ImageField(blank=True, null=True, upload_to='medicine_photos/')),
            ],
        ),
    ]
