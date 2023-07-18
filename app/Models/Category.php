<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      use HasFactory;

      protected $fillable = [
            'name',
            'image'
      ];

      // relazione molti a molti verso tabella pivot category_restaurant
      public function restaurants()
      {
            return $this->belongsToMany(Restaurant::class);
      }
}
