<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Carbon\Carbon;
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

        // $total = DB::table('orders')
        //     ->where('payment_status', 'Completed')
        //     ->sum('total_price');
        $total = DB::table('order_items')
            ->sum('drink_price');

        $data = DB::table('orders')
            ->count('id');

        $order_quantity = DB::table('order_items')
            ->count('drink_quantity');
        $items = DB::table('items')
            ->get();

        // $date = DB::table('order_items')
        //     ->get('created_at');

        // dd($date);

        // $date = DB::table('order_items')
        //     ->select('order_items.created_at as name', DB::raw('count(order_items.created_at) as quantity'))
        //     ->groupBy('order_items.created_at')
        //     ->take(1)
        //     ->get();


        // $dates = $date->mapWithKeys(function ($item, $key) {
        //     return [$item->name => $item->quantity];
        // });

        // // dd($dates);
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

        $sampleqpie2 = $samplepie->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });
        //dd($sampleqpie2);


        $drinks = DB::table('order_items')
            ->join('menu', 'order_items.menu_id', '=', 'menu.id')
            ->select('menu.category as name', DB::raw('count(menu.category) as quantity'))
            ->where('menu.category', 'Coffee')
            ->orWhere('menu.category', 'ADE')
            ->orWhere('menu.category', 'Non-Coffee')
            ->orWhere('menu.category', 'Hisbeanccino')
            ->orWhere('menu.category', 'Organic Brewed Tea')
            ->groupBy('menu.category')
            ->get();

        $drinkQuantity = $drinks->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });
        // dd($drinkQuantity);

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
            ->get();

        $now = Carbon::now()->format('Y-m-d');
        $month = Carbon::now()->format('m');
        $created_date = OrderItem::where('drink_quantity', $now)->count();

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];



        $total_sold = [];
        foreach ($months as $key => $value) {
            $total_sold[] = DB::table('order_items')
                ->where(\DB::raw('DATE_FORMAT(created_at, "%M")'), $value)
                ->count('drink_quantity');
        }

        $total_sales = [];
        foreach ($months as $key => $value) {
            $total_sales[] = DB::table('order_items')
                ->where(\DB::raw('DATE_FORMAT(created_at, "%M")'), $value)
                ->sum('drink_quantity');
        }

        $startDate = Carbon::now()->startOfWeek()->startOfDay();
        $endDate = Carbon::now()->endOfWeek()->endOfDay();


        $weekdays = DB::table('order_items')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->whereRaw('DAYOFWEEK(created_at) BETWEEN 2 AND 6')
            ->sum('drink_price');

        $weekends = DB::table('order_items')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where(function ($query) {
                $query->whereRaw('DAYOFWEEK(created_at) = 1')
                    ->orWhereRaw('DAYOFWEEK(created_at) = 7');
            })

            ->sum('drink_price');


        return view('modules/Sales', [
            'items' => $items,
            'data' => $data,
            'total' => $total,
            'order_quantity' => $order_quantity,
            'sample2' => $sample2,
            'sampleq2' => $sampleq2,
            'samplepie' => $samplepie,
            'sampleqpie2' => $sampleqpie2,
            'orders' => $orders,
            'total_sales' => $total_sales,
            'month' => $months,
            'total_sold' => $total_sold,
            'drinks' => $drinks,
            'drinkQuantity' => $drinkQuantity,
            'weekdays' => $weekdays,
            'weekends' => $weekends,
            // 'dates' => $dates


        ]);
    }
}
