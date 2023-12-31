<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'available',
    ];

    // relazione 1 a molti inversa
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // relazione molti a molti 
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
