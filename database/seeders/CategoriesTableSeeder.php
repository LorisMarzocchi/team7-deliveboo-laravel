<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'name'          => 'Italiano',
                'image'         => 'https://res.cloudinary.com/tf-lab/image/upload/restaurant/22db4230-3e12-4684-b657-48f458c59ae1/99acc6a8-5875-41ee-830d-759e5e4f7187.jpg',

            ],
            [
                'name'          => 'Giapponese',
                'image'         => 'https://media-cdn.tripadvisor.com/media/photo-s/0a/0e/74/b1/hachi-ristorante-giapponese.jpg',

            ],
            [
                'name'          => 'Vegano',
                'image'         => 'https://wips.plug.it/cips/initalia.virgilio.it/cms/2020/05/veg2.jpg',


            ],
            [
                'name'          => 'Pizzeria',
                'image'         => 'https://media.istockphoto.com/id/899907172/it/foto/pizza-margerita-gustosa-al-forno-vicino-al-forno.jpg?s=612x612&w=0&k=20&c=XktWlTnq_736EJ0qhENM-d5btFu9ceVYVBqiu9oA_6s=',

            ],
            [
                'name'          => 'Messicano',
                'image'         => 'https://c8.alamy.com/compit/bchfy6/un-autentico-ristorante-messicano-di-notte-bchfy6.jpg',

            ],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
