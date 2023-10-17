@extends('admin.layouts.base')

@section('contents')

<h1 class="text-4xl font-bold text-secondary text-center mt-28 mb-8 uppercase">Registra il tuo ristorante</h1>
<div class="container grid grid-cols-1 grid-rows-2 lg:grid-cols-3 lg:grid-rows-1 mx-auto max-w-screen-xl px-2 mb-5">

  <form method="POST" 
  action="{{ route('admin.restaurants.store') }}" 
  enctype="multipart/form-data" 
  id="form-create"
  class="lg:col-span-2"
  novalidate 
  >
    @csrf
      <div class="mb-6">
        <label for="name"  class="block mb-2 text-sm font-medium text-secondary">Nome</label>
        <input type="text" 
        id="name-create" 
        name="name" 
        class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5"
        required>
        <div class="mb-2 text-sm text-red-600" id="nameError"></div>
      </div>

      <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-secondary">Descrizione</label>
        <input type="text" 
        name="description" 
        id="description-create" 
        class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
        value="{{old('description')}}" 
        required>
        <div class="mb-2 text-sm text-red-600" id="descriptionError"></div>
      </div>

      <div class="mb-6">
          <label for="city"  class="block mb-2 text-sm font-medium text-secondary">Città</label>
          <input type="text" 
          name="city" 
          id="city-create" 
          class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
          value="{{old('city')}}" 
          required>
          <div class="mb-2 text-sm text-red-600" id="cityError"></div>
        </div>

        <div class="mb-6">
          <label for="address"  class="block mb-2 text-sm font-medium text-secondary">Indirizzo</label>
          <input type="text" 
          name="address" 
          id="address-create" 
          class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
          value="{{old('address')}}"
          required>
          <div class="mb-2 text-sm text-red-600" id="addressError"></div>
        </div>

        <div class="mb-6">
          <label for="vat"  class="block mb-2 text-sm font-medium text-secondary">P. IVA</label>
          <input type="tel" 
          name="vat" 
          id="vat-create" 
          class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
          value="{{old('vat')}}"
          required>
          <div class="mb-2 text-sm text-red-600" id="vatError"></div>
        </div>
        
        <div class="mb-6">
          <label class="block mb-2 text-sm font-medium text-secondary" for="url_image">Immagine</label>
          <input id="url_image" type="file" name="url_image"  value="{{old('url_image')}}" class="block w-full text-sm text-gray-900 border border-primary rounded-lg cursor-pointer bg-gray-50 ">
          <div class="mb-2 text-sm text-red-600" id="url_imageError"></div>
        </div>


        <div class="mb-6">
          <label for="priceRange" class="block mb-2 text-sm font-medium text-secondary">Prezzo medio</label>
          <input type="number" 
          name="priceRange" 
          id="priceRange-create" 
          class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5"
          value="{{old('priceRange')}}"
          >
          <div class="mb-2 text-sm text-red-600" id="priceRangeError"></div>
        </div>

        <div class="mb-6">
          <h3 class="text-gray-900 text-sm font-medium">Categorie</h3>
              
              <fieldset>
                  @foreach ($categories as $category)            
                  <div class="flex items-center mb-4">
                      <input id="category-{{$category->id}}" 
                      type="checkbox" 
                      value="{{$category->id}}"               
                      name="categories[]" 
                      class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 rounded focus:ring-secondary dark:focus:ring-b_hover"  
                      @if (in_array($category->id, old('categories', [])))
                      checked  
                      @endif
                      >
                      <label for="checkbox-1" class="ml-2 text-sm font-normal text-gray-900">{{$category->name}}</label>
                  </div>
                  @endforeach
                  </fieldset>

                  <div class="mb-2 text-sm text-red-600" id="categoryError"></div>
        </div>

      <button type="submit" class="text-white bg-secondary hover:bg-b_hover focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center shadow-md">Salva</button>
  </form>
  <div class="flex lg:items-center justify-center lg:mt-0">
    <img class="h-52" src="{{ Vite::asset('public/img/favicon.png') }}" alt="favicon">
  </div>
</div>
@endsection