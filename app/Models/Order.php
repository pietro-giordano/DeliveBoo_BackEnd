<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_surname',
        'customer_address',
        'customer_email',
        'phone_number',
        'total_price',
    ];

    // relazione molti a molti
    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }
}
