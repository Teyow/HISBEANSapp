<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddOnsController extends Controller
{
    public function getAllAddOns()
    {
        return DB::table('addons')
            ->get();
    }
}
