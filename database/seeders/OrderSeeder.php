<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Model
use App\Models\Order;
use App\Models\Dish;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'customer_name' => 'Marco',
                'customer_surname' => 'Rossi',
                'customer_address' => 'Via Roma 1',
                'customer_email' => 'marco.rossi@gmail.com',
                'phone_number' => '3383568538',
                'total_price' => 17.90
            ],
            [
                'customer_name' => 'Paolo',
                'customer_surname' => 'Verdi',
                'customer_address' => 'Via Milano 2',
                'customer_email' => 'paolo.verdi@gmail.com',
                'phone_number' => '3391234567',
                'total_price' => 12.50
            ],
            [
                'customer_name' => 'Luca',
                'customer_surname' => 'Neri',
                'customer_address' => 'Piazza Garibaldi 7',
                'customer_email' => 'luca.neri@gmail.com',
                'phone_number' => '3391256567',
                'total_price' => 8.50
            ],
            [
                'customer_name' => 'Sara',
                'customer_surname' => 'Ferrari',
                'customer_address' => 'Via Cesare Battisti 74',
                'customer_email' => 'sara.ferrari@gmail.com',
                'phone_number' => '3391223657',
                'total_price' => 28.00
            ]
        ];

        foreach ($orders as $order) {
            $newOrder = Order::create([
                'customer_name' => $order['customer_name'],
                'customer_surname' => $order['customer_surname'],
                'customer_address' => $order['customer_address'],
                'customer_email' => $order['customer_email'],
                'phone_number' => $order['phone_number'],
                'total_price' => $order['total_price'],
            ]);

            // Recupera un numero casuale di piatti dal database
            $dishes = Dish::where('restaurant_id', '2')->inRandomOrder()->take(rand(1, 5))->get();

            $newOrder->dishes()->attach($dishes);
        }
    }
}
