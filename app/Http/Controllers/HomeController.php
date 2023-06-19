<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
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

        $sample = DB::table('order_items')

            ->join('menu', 'order_items.menu_id', '=', 'menu.id')
            ->select('menu.item_name as name', DB::raw('count(order_items.drink_name) as quantity'))
            ->orderBy('quantity', 'desc')
            ->groupBy('menu.item_name')
            ->take(10)
            ->get();

        $sample2 = $sample->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });


        $sampleq = DB::table('order_items')
            ->join('menu', 'order_items.menu_id', '=', 'menu.id')
            ->select('menu.item_name as name', DB::raw('sum(order_items.drink_quantity) as quantity'))
            ->orderBy('name', 'asc')
            ->groupBy('menu.item_name')
            ->take(10)
            ->get();

        $sampleq2 = $sampleq->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });


        $sale = DB::table('orders')
            ->count('id');



        $order = DB::table('order_items')
            ->count("order_id");

        $total = DB::table('orders')
            ->where('payment_status', 'Completed')
            ->sum('total_price');





        return view('modules/home', [
            'sale' => $sale,
            'total' => $total,
            'order' => $order,
            'sample2' => $sample2,
            'sampleq2' => $sampleq2,





        ]);
    }
}
