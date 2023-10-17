@extends('admin.layouts.base')
@section('contents')
    <div class="bg-white rounded-lg shadow-lg m-auto p-4 md:p-6 w-full md:w-3/4 mb-6">
        <h2 class="text-2xl font-bold mb-4 text-center text-secondary uppercase">Ordini</h2>
        <ul>
            @if (count($orders) === 0)
                <div class="text-center mb-10">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4 text-center">Nessun ordine ricevuto</h1>
                </div>
            @else
                <div class="flex flex-col justify-center h-full">
                    <!-- Table -->
                    <header class="px-5 py-4 border-b border-gray-100">
                        <h2 class="font-bold text-center text-b_hover">Riepilogo ordini
                            ricevuti</h2>
                    </header>
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
                                        <th class="p-2 whitespace-nowrap lg:table-cell md:table-cell sm:table-cell hidden">
                                            <span class="font-bold text-center">Totale Ordine</span>
                                        </th>
                                        <th class="p-2 whitespace-nowrap lg:table-cell md:table-cell hidden">
                                            <span class="font-bold text-center">Data</span>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <span class="font-bold text-center">Dettagli ordine</span>
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($orders as $order)
                                    <tbody class="text-sm divide-y divide-gray-100">
                                        <tr>
                                            <td class="p-2 whitespace-nowrap font-bold">
                                                <div class="text-center">#{{ $order->id }}</div>
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
                                            <td class="p-2 whitespace-nowrap lg:table-cell md:table-cell hidden sm:table-cell">
                                                <div class="text-center">
                                                    {{ $order->total_price }}€
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap lg:table-cell md:table-cell hidden">

                                                <div class="text-center">

                                                    {{ \Carbon\Carbon::parse($order->payment_date)->format('d/m/Y') }}

                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center">
                                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                                        class="px-2 py-1 text-xs font-bold text-white bg-green-500 rounded-full hover:bg-green-700">
                                                        Dettagli
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
    </div>
    @endif
@endsection
