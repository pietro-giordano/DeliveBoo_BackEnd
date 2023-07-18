<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder

{
      /**
       * Run the database seeds.
       *
       * @return void
       */

      public function run(Faker $faker)
      {
            for ($i = 0; $i < 15; $i++) {

                  $email = $faker->unique()->email();
                  User::create([
                        'name' => $faker->name(),
                        'email' => $email,
                        'email_verified_at' => now(),
                        'password' => Hash::make("admin")
                  ]);
            }
      }
}
