@extends('admin.layouts.base')
@section('contents')
    <div class="container mx-auto max-w-screen-xl px-2 mt-[120px]">
        <table class="w-full text-sm text-left text-black">
            <thead class="text-secondary uppercase bg-primary">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                        Città
                    </th>
                    <th scope="col" class="px-6 py-3 hidden md:table-cell">
                        Indirizzo
                    </th>
                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                        Prezzo medio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Azioni
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($restaurant)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            {{ $restaurant->name }}
                        </th>
                        <td class="px-6 py-4 hidden sm:table-cell">
                            {{ $restaurant->city }}
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            {{ $restaurant->address }}
                        </td>
                        <td class="px-6 py-4 hidden sm:table-cell">
                            {{ $restaurant->priceRange }}
                        </td>
                        <td class="px-6 py-4 flex gap-1">
                            <button class="rounded-lg bg-secondary hover:bg-b_hover font-medium text-sm text-center text-primary block py-1.5 shadow-md">
                                <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant]) }}"
                                class="px-5 py-2.5">Vista</a>
                            </button>
                            <button class="rounded-lg bg-primary hover:bg-primary_hover font-medium text-sm text-center text-white hidden sm:block shadow-md">
                                <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant]) }}"
                                class="px-5 py-2.5">Modifica</a>
                            </button>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
