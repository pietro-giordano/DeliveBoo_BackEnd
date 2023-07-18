<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Dish;
use App\Models\Restaurant;
// Helpers
use Illuminate\Support\Str;


class DishSeeder extends Seeder
{
      /**
       * Run the database seeds.
       *
       * @return void
       */
      public function run()
      {

            $dishes = config('dishes');
            foreach ($dishes as $dish) {
                  $newDish = Dish::create([
                        'name' => $dish['name'],
                        'slug' => Str::Slug($dish['name']),
                        'description' => $dish['description'],
                        'price' => random_int(5, 15),
                        'image' => $dish['image'],
                        'available' => 1,
                        // 'available' => random_int(0, 1),        nel caso si voglia generare la disponibilità in modo casuale
                        'restaurant_id' => $dish['restaurant_id']
                  ]);
            }
      }
}
