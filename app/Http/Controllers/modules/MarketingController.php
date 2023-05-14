<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function index()
    {
        return view('modules/marketing');
    }

    public function vouchers()
    {
        return view('modules/vouchers');
    }

    public function promotions()
    {
        return view('modules/promotions');
    }

    public function addVoucher()
    {
        return view('modules/addVoucher');
    }
}
