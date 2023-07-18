<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
      /**
       * Run the migrations.
       *
       * @return void
       */
      public function up()
      {
            Schema::create('restaurants', function (Blueprint $table) {
                  $table->id();
                  $table->string('restaurant_name', 128);
                  $table->string('slug')->unique();
                  $table->text('description')->nullable();
                  $table->string('address', 255)->unique();
                  $table->string('city', 64);
                  $table->string('vat', 11)->unique();
                  $table->string('phone', 10);
                  $table->string('image', 255)->nullable();
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       *
       * @return void
       */
      public function down()
      {
            Schema::dropIfExists('restaurants');
      }
};
