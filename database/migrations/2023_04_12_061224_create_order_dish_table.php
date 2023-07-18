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
            Schema::create('order_dish', function (Blueprint $table) {

                  $table->unsignedBigInteger('order_id');
                  $table->foreign('order_id')
                        ->references('id')
                        ->on('orders')
                        ->onDelete('cascade');

                  $table->unsignedBigInteger('dish_id');
                  $table->foreign('dish_id')
                        ->references('id')
                        ->on('dishes')
                        ->onDelete('cascade');

                  $table->integer('quantity')->default(1);

                  $table->primary(['order_id', 'dish_id']);

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
            Schema::dropIfExists('order_dish');
      }
};
