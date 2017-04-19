from django.shortcuts import render, HttpResponse, redirect
from . import models
from models import Product
# Create your views here.
def index(request):
    products = models.Product.objects.all()
    context = {
        'products':products
    }
    return render(request, 'semirestful/index.html', context)

def show(request, id):
    products = models.Product.objects.get(id=id)
    context = {
        'id':products.id,
        'name':products.name,
        'description':products.description,
        'price':products.price
    }
    return render(request, 'semirestful/show.html', context)

def new(request):
    return render(request, 'semirestful/new.html')

def edit(request, id):
    product = models.Product.objects.get(id=id)
    context = {
        'id':product.id,
        'name':product.name,
        'description':product.description,
        'price':product.price
    }
    return render(request, 'semirestful/edit.html', context)

def create(request):
    c = Product(name=request.POST['name'], description=request.POST['description'], price=request.POST['price'])
    c.save()
    return redirect('/')

def update(request, id):
    p = models.Product.objects.get(id=id)
    p.name = request.POST['name']
    p.description = request.POST['description']
    p.price = request.POST['price']
    p.save()
    return redirect('/')

def destroy(request, id):
    d = models.Product.objects.get(id=id)
    d.delete()
    return redirect('/')
