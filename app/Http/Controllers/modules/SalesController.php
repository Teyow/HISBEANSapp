<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $total = DB::table('orders')
            ->where('payment_status', 'Completed')
            ->sum('total_price');


        $data = DB::table('orders')
            ->count('id');

        $order_quantity = DB::table('order_items')
            ->count('drink_quantity');

        return view('modules/Sales', [
            'data' => $data,
            'total' => $total,
            'order_quantity' => $order_quantity
        ]);
    }
}
