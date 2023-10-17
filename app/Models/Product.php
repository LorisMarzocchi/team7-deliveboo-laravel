<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Restaurant;
use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Slugger;
    public $timestamps = false;

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $user = auth()->user(); // Ottieni l'utente autenticato corrente
            if (!$product->restaurant_id && $user) {
                $product->restaurant_id = $user->restaurant->id;
            }
        });
    }
    
}
