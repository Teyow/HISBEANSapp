<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sale = DB::table('orders')
            ->count('id');

        $order = DB::table('orders')
            ->get();

        $total = DB::table('orders')
            ->where('payment_status', 'Completed')
            ->sum('total_price');
        // DB::table('orders')
        // ->sum('total_price');



        return view('modules/home', [
            'sale' => $sale,
            'total' => $total,
            'order' => $order

        ]);
    }
}
