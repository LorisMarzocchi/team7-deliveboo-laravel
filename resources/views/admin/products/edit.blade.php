@extends('admin.layouts.base')
@section('contents')
<h1 class="text-center font-bold text-3xl mt-28 mb-2 text-secondary">MODIFICA IL TUO PRODOTTO</h1>
<div class="container mx-auto max-w-screen-xl px-2 mb-2">
    <form
    method="POST"
    action="{{ route('admin.products.update', ['product' => $product]) }}"
    enctype="multipart/form-data"
    id="product_edit_form"
    >
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label block mb-2 text-sm font-medium text-secondary">Nome</label>
            <input type="text" 
            class="form-control bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" id="product_name_edit" 
            name="name" 
            value="{{old('name', $product->name)}}">
        </div>
        <div class="mb-2 text-sm error" id="ProductNameError"></div>

        <div class="mb-3">
            <label for="ingredients" class="form-label block mb-2 text-sm font-medium text-secondary">Ingredienti</label>
            <input type="text" 
            class="form-control bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" id="product_ingredients_edit" 
            name="ingredients" 
            value="{{old('ingredients', $product->ingredients)}}">
        </div>
        <div class="mb-2 text-sm error" id="ProductIngredientsError"></div>

        <div class="mb-3">
            <label for="price" class="form-label block mb-2 text-sm font-medium text-secondary">Prezzo</label>
            <input type="text" 
            class="form-control bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" id="product_price_edit" 
            name="price" 
            value="{{old('price', $product->price)}}">
        </div>
        <div class="mb-2 text-sm error" id="ProductPriceError"></div>

        <div class="mb-3">
            <label for="description" class="form-label block mb-2 text-sm font-medium text-secondary">Descrizione</label>
            <textarea class="form-control bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
            name="description" 
            id="product_description_edit"
            rows="3">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-2 text-sm error" id="ProductDescriptionError"></div>


        <div class="mb-6">
            <label class="form-label block mb-2 text-sm font-medium text-secondary" for="url_image">Immagine</label>
            <input id="url_image" type="file" name="url_image"  value="{{old('url_image', $product->url_image)}}" class="form-control block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" accept=".jpg, .jpeg, .png">
        </div>
        <div class="mb-2 text-sm error" id="url_imageError"></div>


    <button type="submit" class="text-white bg-secondary hover:bg-b_hover focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center shadow-md">Salva</button>
</form>

        
</div>

@endsection