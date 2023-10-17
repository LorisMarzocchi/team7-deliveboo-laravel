@extends('admin.layouts.base')
@section('contents')
    <div class="mt-[95px] container max-w-5xl mx-auto px-2">
        <h1 class="font-bold text-secondary text-3xl text-center mx-auto uppercase mb-3">Dettagli ordine</h1>
        <p><span class="font-bold text-secondary">Id ordine: </span> #{{ $order->id }}</p>
        <p><span class="font-bold text-secondary">Nome: </span>{{ $order->name }}</p>
        <p><span class="font-bold text-secondary">Cognome: </span>{{ $order->surname }}</p>
        <p><span class="font-bold text-secondary">Email: </span>{{ $order->email }}</p>
        <p><span class="font-bold text-secondary">Totale Ordine:</span> {{ $order->total_price }}€</p>
        <p>
            <span class="font-bold text-secondary">Data di Pagamento: </span>
            {{ \Carbon\Carbon::parse($order->payment_date)->format('d/m/Y') }}
        </p>
        <p>
            <span class="font-bold text-secondary">Orario di Pagamento: </span>
            {{ \Carbon\Carbon::parse($order->payment_date)->format('H:i') }}
        </p>

        <h2 class="font-bold mt-10 text-secondary text-3xl text-center mx-auto uppercase mb-3">Prodotti Ordinati:</h2>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-secondary uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3 rounded-l-lg">
                            Nome
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Prezzo Unitario
                        </th>
                        <th scope="col" class="px-4 py-3 rounded-r-lg">
                            Quantità
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-4 py-4 font-medium">
                                {{ $product->name }}
                            </th>
                            <td class="px-4 py-4">
                                {{ $product->price }} €
                            </td>
                            <td class="px-4 py-4">
                                {{ $product->pivot->product_quantity }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
