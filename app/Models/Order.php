<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'voucher_id',
        'total_price',
        'mode_of_payment',
        'order_status',
        'payment_status',
    ];
}
