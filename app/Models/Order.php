<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'total_price', 'restaurant_id', 'name', 'surname', 'email', 'message', 'payment_date'
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('product_quantity');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
