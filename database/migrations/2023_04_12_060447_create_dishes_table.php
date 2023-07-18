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
            Schema::create('dishes', function (Blueprint $table) {
                  $table->id();
                  $table->string('name', 128);
                  $table->string('slug');
                  $table->text('description')->nullable();
                  $table->decimal('price', 6, 2)->unsigned(); //decimal con due decimali
                  $table->string('image', 255)->nullable();
                  $table->boolean('available')->default(1);
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
            Schema::dropIfExists('dishes');
      }
};
