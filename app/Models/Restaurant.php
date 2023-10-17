<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Traits\Slugger;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;
    use Slugger;

    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'city', 'address', 'vat', 'url_image', 'priceRange', 'rating_value', 'review_count', 'product_ID', 'user_ID', 'order_ID'
    ];

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
