<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


// Helpers
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
      /**
       * Run the database seeds.
       *
       * @return void
       */
      public function run()
      {
            $categories = [
                  ['name' => 'italiano', 'image' => 'categories/La-cucina-italiana.jpg'],
                  ['name' => 'indiano', 'image' => 'categories/cucina-indiana.jpg'],
                  ['name' => 'cinese', 'image' => 'categories/cucinacinese.jpg'],
                  ['name' => 'giapponese', 'image' => 'categories/giapponese.jpg'],
                  ['name' => 'greco', 'image' => 'categories/piatti-tipici-greci.jpg'],
                  ['name' => 'vegano', 'image' => 'categories/cucina-vegana.jpg'],
                  ['name' => 'pizzeria', 'image' => 'categories/pizza.jpg'],
                  ['name' => 'hawaiiano', 'image' => 'categories/pokeri-poke.jpeg'],
            ];

            foreach ($categories as  $category) {
                  $category = Category::create([
                        'name' => $category['name'],
                        'slug' => Str::Slug($category['name']),
                        'image' => $category['image']
                  ]);
            }
      }
}
