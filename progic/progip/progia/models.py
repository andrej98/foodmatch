# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey and OneToOneField has `on_delete` set to the desired behavior
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models


class GroupRestaurant(models.Model):
    group = models.OneToOneField('Groups', models.DO_NOTHING, primary_key=True)
    restaurant = models.ForeignKey('Restaurants', models.DO_NOTHING)
    created_at = models.DateTimeField(blank=True, null=True)
    updated_at = models.DateTimeField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'group_restaurant'
        unique_together = (('group', 'restaurant'),)


class GroupUser(models.Model):
    group = models.OneToOneField('Groups', models.DO_NOTHING, primary_key=True)
    user = models.ForeignKey('Users', models.DO_NOTHING)

    class Meta:
        managed = False
        db_table = 'group_user'
        unique_together = (('group', 'user'),)


class Groups(models.Model):
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=255)
    code = models.CharField(unique=True, max_length=255)
    created_at = models.DateTimeField(blank=True, null=True)
    updated_at = models.DateTimeField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'groups'


class Likes(models.Model):
    user = models.OneToOneField('Users', models.DO_NOTHING, primary_key=True)
    restaurant = models.ForeignKey('Restaurants', models.DO_NOTHING)
    created_at = models.DateTimeField(blank=True, null=True)
    updated_at = models.DateTimeField(blank=True, null=True)
    liked = models.IntegerField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'likes'
        unique_together = (('user', 'restaurant'),)


class Migrations(models.Model):
    migration = models.CharField(max_length=255)
    batch = models.IntegerField()

    class Meta:
        managed = False
        db_table = 'migrations'


class PasswordResets(models.Model):
    email = models.CharField(max_length=255)
    token = models.CharField(max_length=255)
    created_at = models.DateTimeField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'password_resets'


class Preferences(models.Model):
    id = models.BigAutoField(primary_key=True)
    user = models.ForeignKey('Users', models.DO_NOTHING)
    vegetarian = models.IntegerField()
    vegan = models.IntegerField()
    nut_allergy = models.IntegerField()
    lactose_intolerance = models.IntegerField()
    gluten_intolerance = models.IntegerField()
    bio_food = models.IntegerField()
    local_food = models.IntegerField()
    favorite_food = models.CharField(max_length=255, blank=True, null=True)
    created_at = models.DateTimeField(blank=True, null=True)
    updated_at = models.DateTimeField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'preferences'


class Ratings(models.Model):
    user = models.OneToOneField('Users', models.DO_NOTHING, primary_key=True)
    restaurant = models.ForeignKey('Restaurants', models.DO_NOTHING)
    rating = models.PositiveIntegerField()
    created_at = models.DateTimeField(blank=True, null=True)
    updated_at = models.DateTimeField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'ratings'
        unique_together = (('user', 'restaurant'),)


class Restaurants(models.Model):
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=255)
    address = models.CharField(max_length=255)
    description = models.TextField(blank=True, null=True)
    vegetarian = models.IntegerField()
    vegan = models.IntegerField()
    nut_allergy = models.IntegerField()
    lactose_intolerance = models.IntegerField()
    gluten_intolerance = models.IntegerField()
    bio_food = models.IntegerField()
    local_food = models.IntegerField()
    favorite_food = models.CharField(max_length=255, blank=True, null=True)
    created_at = models.DateTimeField(blank=True, null=True)
    updated_at = models.DateTimeField(blank=True, null=True)
    rating = models.FloatField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'restaurants'

    def __str__(self):
        return self.name + " " + str(self.rating) + "\n"


class Users(models.Model):
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=255)
    email = models.CharField(unique=True, max_length=255)
    email_verified_at = models.DateTimeField(blank=True, null=True)
    password = models.CharField(max_length=255)
    remember_token = models.CharField(max_length=100, blank=True, null=True)
    created_at = models.DateTimeField(blank=True, null=True)
    updated_at = models.DateTimeField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'users'
