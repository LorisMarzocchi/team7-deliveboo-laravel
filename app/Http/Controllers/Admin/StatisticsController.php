<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function year(int $restaurantId) {
        $restaurant = Restaurant::findOrFail($restaurantId);
        DB::statement("SET lc_time_names = 'it_IT'");
        $orders = Restaurant::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(orders.payment_date) as month_name"))
            ->where('restaurant_id', $restaurantId)
            ->leftJoin('orders', 'restaurants.id', '=', 'orders.restaurant_id')
            ->whereYear('payment_date', date('Y'))
            ->groupBy(DB::raw("MONTH(orders.payment_date)"), DB::raw("MONTHNAME(orders.payment_date)"))
            ->pluck('count', 'month_name');

        $labels = $orders->keys();
        $data = $orders->values();

        return view('admin.statistics.index', [
            'restaurant' => $restaurant,
            'labels'     => $labels,
            'data'       => $data,
        ]);
    }

    public function months(int $restaurantId, Request $request) {
        $restaurant = Restaurant::findOrFail($restaurantId);
        $selectedMonth = $request->input('month');
        $year = date('Y'); // Ottieni l'anno corrente
    
        // Mappa i numeri dei mesi ai loro nomi in italiano
        $italianMonths = [
            1 => 'Gennaio',
            2 => 'Febbraio',
            3 => 'Marzo',
            4 => 'Aprile',
            5 => 'Maggio',
            6 => 'Giugno',
            7 => 'Luglio',
            8 => 'Agosto',
            9 => 'Settembre',
            10 => 'Ottobre',
            11 => 'Novembre',
            12 => 'Dicembre',
        ];
    
        $ordersQuery = DB::table('orders')
            ->select(DB::raw('DAY(payment_date) as day'), DB::raw('COUNT(*) as count'))
            ->where('restaurant_id', $restaurantId)
            ->whereYear('payment_date', $year);
    
        if ($selectedMonth) {
            $ordersQuery->whereMonth('payment_date', $selectedMonth);
        }
    
        $orders = $ordersQuery->groupBy(DB::raw('DAY(payment_date)'))
            ->orderBy(DB::raw('DAY(payment_date)'))
            ->pluck('count', 'day');
    
        // Crea un array di etichette con i giorni del mese selezionato
        $labels = [];
        $data = [];
    
        $lastDayOfMonth = Carbon::createFromDate($year, $selectedMonth, 1)->endOfMonth()->day;
    
        for ($day = 1; $day <= $lastDayOfMonth; $day++) {
            $labels[] = $day;
            $data[] = $orders[$day] ?? 0;
        }
    
        // Ottieni il nome del mese in italiano
        $selectedMonthName = $italianMonths[$selectedMonth] ?? '';
    
        return view('admin.statistics.months', compact('restaurant', 'labels', 'data', 'selectedMonth', 'italianMonths'));
    }
}
