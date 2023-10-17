@extends('admin.layouts.base')
@section('contents')
<h1 class="text-center text-3xl font-bold mb-8 mt-32 text-secondary">NUOVO PRODOTTO</h1>
<div class="container grid grid-cols-1 grid-rows-2 lg:grid-cols-3 lg:grid-rows-1 mx-auto max-w-screen-xl px-2">
    <form
    method="POST"
    action="{{ route('admin.products.store') }}"
    enctype="multipart/form-data"
    id="product_create_form"
    class="col-span-2"
    novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label text-secondary font-semibold">Nome</label>
            <input type="text" 
            class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-secondary focus:border-b_hover" id="product_name_create" 
            name="name" 
            value="{{old('name')}}"
            placeholder="Inserisci il nome del tuo prodotto">
        </div>
        <div class="mb-2 error text-sm" id="ProductNameError"></div>

        <div class="mb-3">
            <label for="ingredients" class="form-label text-secondary font-semibold">Ingredienti</label>
            <input type="text" 
            class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-secondary focus:border-b_hover" id="product_ingredients_create" 
            name="ingredients" 
            value="{{old('ingredients')}}"
            placeholder="Inserisci gli ingredienti del tuo prodotto">
        </div>
        <div class="mb-2 error text-sm" id="ProductIngredientsError"></div>

        <div class="mb-3">
            <label for="price" class="form-label text-secondary font-semibold">Prezzo</label>
            <input type="number" 
            class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-secondary focus:border-b_hover" id="product_price_create" 
            name="price" 
            value="{{old('price')}}"
            placeholder="Inserisci il prezzo del tuo prodotto">
        </div>
        <div class="mb-2 error text-sm" id="ProductPriceError"></div>

        <div class="mb-3">
            <label for="description" class="form-label text-secondary font-semibold">Descrizione</label>
            <textarea class="form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-secondary focus:border-b_hover" 
            name="description" 
            id="product_description_create"
            rows="3"
            placeholder="Inserisci la descrizione del tuo prodotto">{{ old('description') }}</textarea>
        </div>
        <div class="mb-2 error text-sm" id="ProductDescriptionError"></div>

        <div class="mb-3">
            <label class="form-label text-secondary font-semibold" for="url_image">Immagine</label>
            <input id="url_image" type="file" name="url_image"  value="{{old('url_image')}}" class="form-control block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-secondary focus:border-b_hover" accept=".jpg, .jpeg, .png">
        </div>
        <div class="mb-2 error text-sm" id="url_imageError"></div>
        

        <button class="rounded-lg bg-secondary hover:bg-b_hover font-medium text-sm px-5 py-2.5 mt-4 text-center text-white shadow-md">Salva</button>
    </form>
    <div class="flex lg:items-center justify-center lg:mt-0">
        <img class="h-52" src="{{ Vite::asset('public/img/favicon.png') }}" alt="favicon">
    </div>
</div>
@endsection