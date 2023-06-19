<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
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

        $samplepie = DB::table('order_items')
            ->join('menu', 'order_items.menu_id', '=', 'menu.id')
            ->select('menu.category as name', DB::raw('count(menu.category) as quantity'))
            ->groupBy('menu.category')

            ->get();
        // dd($samplepie);
        $sampleqpie2 = $samplepie->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });
        // dd($sampleqpie2);

        // $orderss = DB::table('order_items')
        //     ->join('menu', 'order_items.menu_id', '=', 'menu.id')

        //     ->select('order_items.id', 'order_items.created_at', 'menu.category')
        //     ->get();
        // dd($orderss);

        $orders = DB::table('order_items')
            ->join('menu', 'order_items.menu_id', '=', 'menu.id')

            ->select(
                'order_items.id',
                'order_items.created_at',
                'menu.category',
                'order_items.drink_name',
                'order_items.menu_id',
                'order_items.drink_quantity',
                'order_items.drink_price'
            )
            // ->select('order_items.created_at')
            ->get();




        return view('modules/Sales', [
            'data' => $data,
            'total' => $total,
            'order_quantity' => $order_quantity,
            'sample2' => $sample2,
            'sampleq2' => $sampleq2,
            'samplepie' => $samplepie,
            'sampleqpie2' => $sampleqpie2,
            'orders' => $orders,


        ]);
    }
}
