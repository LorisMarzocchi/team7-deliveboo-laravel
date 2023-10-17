<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = config('products');
        foreach ($products as $objProduct) {

            $slug = Product::slugger($objProduct['name']);

            $product = Product::create([
                'restaurant_id'  => $objProduct['restaurant_id'],
                'name'           => $objProduct['name'],
                'slug'           => $slug,
                'ingredients'    => $objProduct['ingredients'],
                'price'          => $objProduct['price'],
                'description'    => $objProduct['description'],
                'url_image'      => $objProduct['url_image'],
                'visible'        => $objProduct['visible'] ?? true,
            ]);
        }
    }
}
