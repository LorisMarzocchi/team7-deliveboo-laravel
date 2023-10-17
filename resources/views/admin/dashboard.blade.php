@extends('admin.layouts.base')
@section('contents')
    @if ($restaurant)
        <div class="min-h-screen bg-gray-100 p-6 flex flex-col items-center">
            <!-- Header del ristorante -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-secondary mb-4">{{ $restaurant->name }}</h1>
                <div class="bg-white rounded-lg shadow-lg p-4 md:p-6 w-full md:w-3/4 mb-6 mx-auto">
                    <p class="text-gray-600">{{ $restaurant->description }}</p>
                    <p class="mt-4">{{ $restaurant->city }}, {{ $restaurant->address }}</p>
                    <p class="text-gray-500">Prezzo medio: {{ $restaurant->priceRange }} €</p>

                    @if (isset($restaurant->rating_value) && isset($restaurant->review_count))
                        <div class="mt-4 flex justify-center items-center space-x-2">
                            <p class="text-yellow-500 font-bold text-xl">Voto medio: {{ $restaurant->rating_value }}</p>
                            <p class="text-gray-500">({{ $restaurant->review_count }} recensioni)</p>
                        </div>
                    @endif

                </div>
            </div>


            <!-- Ordini -->
            <div class="bg-white rounded-lg shadow-lg p-4 md:p-6 w-full md:w-3/4 mb-6">
                <h2 class="text-2xl font-bold text-secondary mb-4 text-center">Ordini</h2>

                @if (count($orders) === 0)
                    <div class="text-center mb-10">
                        <h1 class="text-4xl font-bold text-secondary mb-4">Nessun ordine ricevuto</h1>
                    </div>
                @else
                    <div class="flex flex-col justify-center h-full">
                        <!-- Table -->
                        <div class="px-5 py-4 border-b border-gray-100">
                            <h2 class="font-bold text-center md:text-left lg:text-left text-b_hover">Ultimi ordini
                                ricevuti
                            </h2>

                        </div>
                        <div class="p-3">
                            <div class="overflow-x-auto">
                                <table class="min-w-full table-auto">
                                    <thead class="text-xs font-semibold uppercase text-secondary bg-primary">
                                        <tr>
                                            <th class="p-2 whitespace-nowrap">
                                                <span class="font-bold text-left">Id Ordine</span>
                                            </th>
                                            <th class="p-2 whitespace-nowrap lg:table-cell hidden">
                                                <span class="font-bold text-left">Name</span>
                                            </th>
                                            <th class="p-2 whitespace-nowrap lg:table-cell hidden">
                                                <span class="font-bold text-left">Cognome
                                                </span>
                                            </th>
                                            <th class="p-2 whitespace-nowrap lg:table-cell hidden">
                                                <span class="font-bold text-left">Email</span>
                                            </th>
                                            <th class="p-2 whitespace-nowrap lg:table-cell md:table-cell hidden">
                                                <span class="font-bold text-center">Totale Ordine</span>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <span class="font-bold text-center">Data</span>
                                            </th>

                                        </tr>
                                    </thead>
                                    @foreach ($orders as $order)
                                        <tbody class="text-sm divide-y divide-gray-100">
                                            <tr>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-center"><a
                                                            href="{{ route('admin.orders.show', $order->id) }}"
                                                            class="block py-2 pl-3 pr-4 underline hover:text-secondary md:p-0 rounded md:bg-transparent"
                                                            aria-current="page">#{{ $order->id }}</a>
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap lg:table-cell hidden">
                                                    <div class="text-center">{{ $order->name }}</div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap lg:table-cell hidden">
                                                    <div class="text-center">
                                                        {{ $order->surname }}
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap lg:table-cell hidden">
                                                    <div class="text-center">{{ $order->email }}
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap lg:table-cell md:table-cell hidden">
                                                    <div class="text-center">
                                                        {{ $order->total_price }}€
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap ">

                                                    <div class="text-center">

                                                        {{ \Carbon\Carbon::parse($order->payment_date)->format('d/m/Y') }}

                                                    </div>
                                                </td>

                                            </tr>

                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <div class=" flex justify-end mt-5 ">
                                <a href="{{ route('admin.orders.index') }}"
                                    class=" underline text-secondary text-xs">Visualizza tutti gli ordini
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-lg text-secondary font-bold mb-4">Le tue statistiche</h3>
                        <a href="{{ route('admin.restaurant.statistics.year', ['id' => $restaurant->id]) }}" class="text-sm px-4 py-2 bg-secondary hover:bg-b_hover text-white rounded-md shadow-md">Grafico annuale</a>
                        <a href="{{ route('admin.restaurant.statistics.months', ['id' => $restaurant->id]) }}" class="text-sm px-4 py-2 bg-secondary hover:bg-b_hover text-white rounded-md shadow-md">Grafici mensili</a>
                    </div>
                @endif
            </div>
        </div>
                    
    @else
        <div class="p-2 lg:p-0">
            <div class="text-center mt-40 mb-10 p-12 bg-primary max-w-4xl mx-auto rounded-md">
                <h1 class="text-4xl font-bold text-secondary mb-8 drop-shadow-md">Nessun ristorante trovato</h1>
                <a href="{{ route('admin.restaurants.create') }}" class="bg-secondary hover:bg-b_hover text-primary px-6 py-2 rounded-md shadow-md">Crea
                    Ristorante</a>
            </div>
        </div>
    @endif
@endsection
