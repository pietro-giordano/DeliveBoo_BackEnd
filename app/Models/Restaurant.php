<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
      use HasFactory;

      protected $fillable = [
            'user_id',
            'restaurant_name',
            'slug',
            'description',
            'address',
            'city',
            'vat',
            'phone',
            'image',
      ];

      // relazione 1 a 1 inversa
      public function user()
      {
            return $this->belongsTo(User::class);
      }

      // relazione molti a molti verso tabella pivot category_restaurant
      public function categories()
      {
            return $this->belongsToMany(Category::class);
      }

      // relazione 1 a molti
      public function dishes()
      {
            return $this->hasMany(Dish::class);
      }
}
