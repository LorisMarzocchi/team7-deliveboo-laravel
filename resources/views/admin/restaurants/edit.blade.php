@extends('admin.layouts.base')

@section('contents')
<h1 class="text-center font-bold text-3xl mt-28 mb-2 text-secondary">MODIFICA IL TUO RISTORANTE</h1>

<div class="container mx-auto max-w-screen-xl px-2 mb-5">
  <form method="POST" 
  action="{{ route('admin.restaurants.update', ['restaurant' => $restaurant]) }}" 
  enctype="multipart/form-data"
  id="form-edit"
  >
      @csrf
      @method('put')

      <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-secondary">Nome</label>
        <input type="text" 
        name="name" 
        id="name-edit" 
        class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
        value="{{ old('name', $restaurant->name) }}"
        >
        <div class="mb-2 text-sm text-red-600" id="nameErrorEdit"></div>
      </div>

      <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-secondary">Descrizione</label>
        <input type="text" 
        name="description" 
        id="description-edit" 
        class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
        value="{{ old('description', $restaurant->description) }}"
        >
        <div class="mb-2 text-sm text-red-600" id="descriptionErrorEdit"></div>
      </div>

      <div class="mb-6">
          <label for="city"  class="block mb-2 text-sm font-medium text-secondary">Città</label>
          <input type="text" 
          name="city" 
          id="city-edit" 
          class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
          value="{{ old('city', $restaurant->city) }}"
          >
          <div class="mb-2 text-sm text-red-600" id="cityErrorEdit"></div>
        </div>

        <div class="mb-6">
          <label for="address"  class="block mb-2 text-sm font-medium text-secondary">Indirizzo</label>
          <input type="text" 
          name="address" 
          id="address-edit" 
          class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
          value="{{ old('address', $restaurant->address) }}"
          >
          <div class="mb-2 text-sm text-red-600" id="addressErrorEdit"></div>
        </div>

        <div class="mb-6">
          <label for="vat"  class="block mb-2 text-sm font-medium text-secondary">P. IVA</label>
          <input type="text" 
          name="vat" 
          id="vat-edit" 
          class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" 
          value="{{ old('vat', $restaurant->vat) }}"
          >
          <div class="mb-2 text-sm text-red-600" id="vatErrorEdit"></div>
        </div>

        <div class="mb-6">
          <label class="block mb-2 text-sm font-medium text-secondary" for="url_image">Immagine</label>
          <input id="url_image-edit" type="file" name="url_image"  value="{{old('url_image')}}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " accept=".jpg, .jpeg, .png">
          <div class="mb-2 text-sm text-red-600" id="url_imageErrorEdit"></div>
        </div>

        <div class="mb-6">
          <label for="priceRange" class="block mb-2 text-sm font-medium text-secondary">Prezzo medio</label>
          <input type="number" 
          name="priceRange" 
          id="priceRange-edit" 
          class="bg-gray-50 border border-primary text-gray-900 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5"
          value="{{ old('priceRange', $restaurant->priceRange) }}"
          >
          <div class="mb-2 text-sm text-red-600" id="priceRangeErrorEdit"></div>
        </div>

        <div class="mb-6">
          <h3 class="text-gray-900 text-sm font-medium">Categorie</h3>
              
              <fieldset>
                  @foreach ($categories as $category)            
                  <div class="flex items-center mb-4">
                      <input 
                      id="category-{{$category->id}}" 
                      type="checkbox" 
                      value="{{$category->id}}"               
                      name="categories[]" 
                      class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 rounded focus:ring-secondary dark:focus:ring-b_hover"  
                      @if (in_array($category->id, old('categories', $restaurant->categories->pluck('id')->all())))
                          checked  
                      @endif
                      >
                      <label for="category-{{$category->id}}" class="ml-2 text-sm font-normal text-gray-900 dark:text-gray-300">{{$category->name}}</label>
                  </div>
                  @endforeach

                  </fieldset>

                  <div class="mb-2 text-sm text-red-600" id="categoryErrorEdit"></div>
        </div>

      <button type="submit" class="text-white bg-secondary hover:bg-b_hover focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center shadow-md">Salva</button>
  </form>
</div>
@endsection