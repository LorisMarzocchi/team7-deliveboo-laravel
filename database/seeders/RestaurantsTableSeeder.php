<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('deliveboo') as $objRestaurant) {

            $slug = Restaurant::slugger($objRestaurant['name']);

            $restaurant = Restaurant::create([
                'name'                  => $objRestaurant['name'],
                'user_id'               => $objRestaurant['user_id'],
                'slug'                  => $slug,
                'description'           => $objRestaurant['description'],
                'city'                  => $objRestaurant['city'],
                'address'               => $objRestaurant['address'],
                'vat'                   => $objRestaurant['vat'],
                'url_image'             => $objRestaurant['url_image'],
                'priceRange'             => $objRestaurant['priceRange'],
                'rating_value'          => $objRestaurant['rating_value'],
                'review_count'          => $objRestaurant['review_count'],
            ]);

            // Associa le categorie al ristorante
            $restaurant->categories()->sync($objRestaurant['categories']);
            
        }
    }
}
