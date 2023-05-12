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
}
