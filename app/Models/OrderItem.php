<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "menu_id",
        "order_id",
        "addons_id",
        "drink_temperature",
        "drink_name",
        "drink_price",
        "drink_quantity",
        "is_favorite",
    ];
}
