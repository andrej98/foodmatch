from django.contrib import admin
from django.urls import path, include
from . import views

urlpatterns = [
    path('recommendation/<int:id>', views.recomendaciones, name = "Odio mi vida me quiero morir")
]