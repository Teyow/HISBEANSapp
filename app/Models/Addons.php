<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    use HasFactory;
    protected $fillable = [
        'addons_name',
        'whipping_cream',
        'ice_cream',
        'choco_hips',
        'chocolate_sauce',
        'caramel_Sauce',
        'strawberry_sauce',
        'honey',
        'vanilla_syrup',
        'caramel_syrup',
        'condensed_milk',


    ];
}
