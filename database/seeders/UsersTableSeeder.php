<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name"      => "Davide Farci",
                "email"     => "davide.farci@gmail.com",
                "password"  => Hash::make('davide96'),
            ],
            [
                "name"      => "Domenico Ferrari",
                "email"     => "domenico.ferrari@gmail.com",
                "password"  => Hash::make('domenico96'),
            ],
            [
                "name"      => "Loris Marzocchi",
                "email"     => "loris.marzocchi@gmail.com",
                "password"  => Hash::make('loris9696'),
            ],
            [
                "name"      => "Giovanni Palmitessa",
                "email"     => "giovanni.palmitessa@gmail.com",
                "password"  => Hash::make('giovanni96'),
            ],
            [
                "name"      => "Gino Buonvino",
                "email"     => "gino.buonvino@gmail.com",
                "password"  => Hash::make('gino9696'),
            ],
            [
                "name"      => "Donald Trump",
                "email"     => "donald.trump@gmail.com",
                "password"  => Hash::make('donald96'),
            ],
            [
                "name"      => "Martina Smeraldi",
                "email"     => "martina.smeraldi@gmail.com",
                "password"  => Hash::make('martina96'),
            ],
            [
                "name"      => "Cristiano Ronaldo",
                "email"     => "cristiano.ronaldo@gmail.com",
                "password"  => Hash::make('cristiano96'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
