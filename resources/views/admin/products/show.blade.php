@extends('admin.layouts.base')
@section('contents')
    <div class="container mx-auto max-w-screen-xl px-2 mt-[100px] mb-3">
        <div class="border border-gray-200 rounded-lg shadow bg-gray-50">
            <img class="rounded-md w-6/12 h-3/4 mx-auto" src="{{ asset('storage/' . $product->url_image) }}"
                alt="{{ $product->name }}"
                onerror="this.onerror=null; this.src='{{ Vite::asset('public/img/non-disponibile.jpg') }}';" />


            <div class="p-5">
                <h5 class="my-5 text-3xl font-bold tracking-tight text-secondary text-center">{{ $product->name }}</h5>

                <p class="my-5 font-normal text-gray-700"><span class="text-xl font-bold text-secondary">Info:
                    </span>{{ $product->description }}</p>

                <p class="my-5 font-normal text-gray-700"><span class="text-xl font-bold text-secondary">Ingredienti:
                    </span>{{ $product->ingredients }}</p>

                <p class="my-5 font-bold text-gray-700 text-xl"><span class="text-xl font-bold text-secondary">Prezzo:
                    </span>{{ $product->price }} € </p>

                <div class="mx-auto flex justify-center gap-5">
                    <button
                        class="rounded-lg bg-primary hover:bg-primary_hover font-medium text-sm text-center text-white shadow-md">
                        <a href="{{ route('admin.products.edit', ['product' => $product]) }}"
                            class="px-8 py-2.5">Modifica</a>
                    </button>
                    <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center shadow-md"
                        type="button">
                        Elimina
                    </button>
                </div>
            </div>
        </div>

        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-primary rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b border-secondary rounded-t">
                        <h3 class="text-xl font-semibold text-b_hover">
                            Sei sicuro di voler eliminare?
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                            data-modal-hide="defaultModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-secondary">
                            Cliccando su elimina il prodotto verrà eliminato definitivamente. Sei sicuro di voler continuare?
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-secondary rounded-b">
                        <form action="{{ route('admin.products.destroy', ['product' => $product]) }}" method="POST"
                            class="d-inline-block" id="confirm_delete">
                            @csrf
                            @method('delete')
                            <button
                                class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Elimina
                            </button>
                        </form>
                        <button data-modal-hide="defaultModal" type="button"
                            class="text-primary bg-secondary hover:bg-b_hover focus:ring-4 focus:outline-none focus:ring-secondary rounded-lg border border-primary_hover text-sm font-medium px-5 py-2.5 focus:z-10">Torna
                            indietro</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
