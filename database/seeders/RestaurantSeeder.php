<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Model
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Category;

// Helpers
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
      /**
       * Run the database seeds.
       *
       * @return void
       */
      public function run()
      {
            $restaurants = config('restaurants');

            foreach ($restaurants as $restaurant) {
                  $newRestaurant = Restaurant::create([
                        'restaurant_name' => $restaurant['restaurant_name'],
                        'slug' => Str::Slug($restaurant['restaurant_name']),
                        'description' => $restaurant['description'],
                        'address' => $restaurant['address'],
                        'city' => $restaurant['city'],
                        'vat' => $restaurant['vat'],
                        'phone' => $restaurant['phone'],
                        'image' => $restaurant['image'],
                        'user_id' => $restaurant['user_id']
                  ]);

                  $newRestaurant->categories()->attach($restaurant['category_id']);
            }
      }
}
