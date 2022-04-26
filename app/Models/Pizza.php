<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $casts = [
        'size' => 'array',
        'type' => 'array'
    ];
    protected $fillable=['id', 'imageUrl', 'name', 'price', 'category', 'size', 'type', '`rating'];
    protected $table='pizzas';
}
