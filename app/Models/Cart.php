<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        'menu_id',
        'addons_id',
        'drink_temperature',
        'drink_name',
        'drink_price',
        'drink_quantity',
    ];
}
