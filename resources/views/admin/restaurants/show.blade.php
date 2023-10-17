@extends('admin.layouts.base')
@section('contents')
    <div class="container mx-auto max-w-screen-xl px-2 mt-28">
        <div class=" border border-gray-200 rounded-lg shadow bg-gray-50">
            <img class="rounded-md w-6/12 h-3/4 mx-auto" src="{{ asset('storage/' . $restaurant->url_image) }}"
                alt="{{ $restaurant->name }}"
                onerror="this.onerror=null; this.src='{{ Vite::asset('public/img/non-disponibile.jpg') }}';" />

            <div class="p-5">
                <h5 class="my-5 text-3xl font-bold tracking-tight text-secondary text-center">{{ $restaurant->name }}</h5>

                <p class="my-5 font-normal text-gray-700"><span class="text-xl font-bold text-secondary">Info:
                    </span>{{ $restaurant->description }}</p>

                <p class="my-5 font-normal text-gray-700"><span class="text-xl font-bold text-secondary">Indirizzo:
                    </span>{{ $restaurant->address }}, {{ $restaurant->city }}</p>

                <p class="my-5 font-bold text-gray-700 text-xl"><span class="text-xl font-bold text-secondary">P. IVA:
                    </span>{{ $restaurant->vat }}</p>

                <p class="my-5 font-bold text-gray-700 text-xl"><span class="text-xl font-bold text-secondary">Prezzo Medio:
                    </span>{{ $restaurant->priceRange }} €</p>

                @if (isset($restaurant->rating_value) && isset($restaurant->review_count))
                    <div class="flex justify-between flex-col md:flex-row">
                        <div class="text-xl font-bold text-secondary">Voto medio su TripAdvisor: <span
                                class="font-bold text-gray-700 text-xl">{{ $restaurant->rating_value }}</span></div>
                        <div class="text-xl font-bold text-secondary pt-5 md:pt-0">Recensioni su TripAdvisor: <span
                                class="font-bold text-gray-700 text-xl"> {{ $restaurant->review_count }}</span></div>
                    </div>
                @endif
                <button
                    class="rounded-lg mt-5 bg-primary hover:bg-primary_hover font-medium text-sm py-1 text-center text-white shadow-md">
                    <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant]) }}"
                        class="px-5 py-2.5">Modifica</a>
                </button>
            </div>
        </div>
    </div>
@endsection
