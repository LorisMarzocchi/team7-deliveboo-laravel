<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        // Inizializzo le variabili
        $restaurant = null;
        $products = [];
        $orders = [];

        // Controllo se l'utente ha un ristorante
        if (Auth::check()) {
            $restaurant = Auth::user()->restaurant;
        }

        if ($restaurant) {
            // Recupero i prodotti del ristorante se esiste
            $products = $restaurant->products;

            // Recupero gli ordini associati ai prodotti del ristorante
            $orders = Order::whereHas('products', function ($q) use ($restaurant) {
                $q->where('restaurant_id', $restaurant->id);
            })->orderBy('payment_date', 'desc')->limit(5)->get();
        }

        return view('admin.dashboard', compact('restaurant', 'products', 'orders'));
    }
    public function header()
    {
        $restaurant = Auth::user()->restaurant;

        return view('admin.partials.header', compact('restaurant'));
    }
}
