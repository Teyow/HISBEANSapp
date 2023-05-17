<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouchers extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_voucher',
        'voucher_name',
        'voucher_code',
        'minimum_order',
        'valid_until',
        'promo_details',
    ];
}
