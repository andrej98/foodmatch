from django.shortcuts import render
from django.http import HttpResponse
from .models import Restaurants, Preferences

# Create your views here.
def recomendaciones(request, id):
    # PROGRAMAR AQUÍ
    preferences = Preferences.objects.filter(user__id = id)[0]
    data = Restaurants.objects.all().order_by("-rating")
    if preferences.vegan:
        data= data.filter(vegan = 1)
    
    if preferences.vegetarian:
        data= data.filter(vegetarian = 1)
    
    if preferences.bio_food:
        data = data.order_by("-bio_food", "-rating")

    if preferences.gluten_intolerance:
        data = data.filter(gluten_intolerance = 1)

    if preferences.lactose_intolerance:
        data = data.filter(lactose_intolerance = 1)
  
    if preferences.nut_allergy:
        data = data.filter(nut_allergy = 1)

    if preferences.local_food:
        data = data.order_by("-local_food", "-rating")


    




    return HttpResponse(data[0], request)