<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $numOfRestaurants = 8;
        $ordersPerRestaurant = 200;
        $productsPerOrder = 3;

        for ($i = 1; $i <= $numOfRestaurants; $i++) {
            for ($j = 0; $j < $ordersPerRestaurant; $j++) {
                $order = Order::create([
                    'total_price' => $faker->numberBetween(10, 150),
                    'name' => $faker->name(),
                    'surname' => $faker->lastName(),
                    'email' => $faker->email(),
                    'message' => $faker->text(),
                    'payment_date' => $faker->dateTimeInInterval('-1 year', '+1 year'),
                    'restaurant_id' => $i,
                ]);

                $productIds = $this->getUniqueProductIds($productsPerOrder, 30);

                foreach ($productIds as $productId) {
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'product_quantity' => $faker->numberBetween(1, 10),
                    ]);
                }
            }
        }
    }

    protected function getUniqueProductIds($count, $maxProductId)
    {
        $ids = [];
        while (count($ids) < $count) {
            $randomId = rand(1, $maxProductId);
            if (!in_array($randomId, $ids)) {
                $ids[] = $randomId;
            }
        }
        return $ids;
    }
}
