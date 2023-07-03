<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
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

        // $query = OrderItem::query();
        // $date = $request->date_filter;

        // switch ($date) {
        //     case 'Day':
        //         $query->whereDate('created_at', Carbon::today());
        //         break;
        //     case 'Week':
        //         $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        //         break;
        //     case 'Month':
        //         $query->whereMonth('created_at', Carbon::now()->month);
        //         break;
        // }
        // $filter_date = $query->get();



        // $startDate = Carbon::now()->startOfWeek();
        // $endDate = Carbon::now()->endOfWeek();

        // $a = DB::table('order_items')
        //     ->whereDate('created_at', [$startDate, $endDate])
        //     ->orderBy('created_at', 'asc')
        //     ->get('created_at');
        // dd($a);
        // $sale = DB::table('orders')
        //     ->count('id');



        // $order = DB::table('order_items')
        //     ->count("order_id");

        // $total = DB::table('orders')
        //     ->where('payment_status', 'Completed')
        //     ->sum('total_price');



        $today = Carbon::today();
        $this_month = Carbon::now()->month;
        $this_year = Carbon::now()->year;

        //TODAYS LINE CHART
        $sample = DB::table('order_items')
            ->join('menu', 'order_items.menu_id', '=', 'menu.id')
            ->select('menu.item_name as name', DB::raw('count(order_items.drink_name) as quantity'))
            ->whereDate('order_items.created_at', $today)
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
            ->whereDate('order_items.created_at', $today)
            ->orderBy('name', 'asc')
            ->groupBy('menu.item_name')
            ->take(10)
            ->get();

        $sampleq2 = $sampleq->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });

        //MONTHY LINE CHART
        $dataQuantity = DB::table('order_items')
            ->join('menu', 'order_items.menu_id', '=', 'menu.id')
            ->select('menu.item_name as name', DB::raw('count(order_items.drink_name) as quantity'))
            ->whereMonth('order_items.created_at', $this_month)
            ->orderBy('quantity', 'desc')
            ->groupBy('menu.item_name')
            ->take(10)
            ->get();

        $monthlyChartQuantity = $dataQuantity->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });

        $dataName = DB::table('order_items')
            ->join('menu', 'order_items.menu_id', '=', 'menu.id')
            ->select('menu.item_name as name', DB::raw('sum(order_items.drink_quantity) as quantity'))
            ->whereMonth('order_items.created_at', $this_month)
            ->orderBy('name', 'asc')
            ->groupBy('menu.item_name')
            ->take(10)
            ->get();

        $monthlyChartName = $dataName->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });

        //YEARLY LINE CHART
        $dataQuantity = DB::table('order_items')
            ->join('menu', 'order_items.menu_id', '=', 'menu.id')
            ->select('menu.item_name as name', DB::raw('count(order_items.drink_name) as quantity'))
            ->whereYear('order_items.created_at', $this_year)
            ->orderBy('quantity', 'desc')
            ->groupBy('menu.item_name')
            ->take(10)
            ->get();

        $yearlyChartQuantity = $dataQuantity->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });


        $dataName = DB::table('order_items')
            ->join('menu', 'order_items.menu_id', '=', 'menu.id')
            ->select('menu.item_name as name', DB::raw('sum(order_items.drink_quantity) as quantity'))
            ->whereYear('order_items.created_at', $this_year)
            ->orderBy('name', 'asc')
            ->groupBy('menu.item_name')
            ->take(10)
            ->get();

        $yearlyChartName = $dataName->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });



        //TODAYS
        $today_total_order = DB::table('order_items')
            ->whereDate('created_at', $today)
            ->orderBy('created_at', 'asc')
            ->count('order_id');

        $today_total_customer = DB::table('orders')
            ->whereDate('created_at', $today)
            ->orderBy('created_at', 'asc')
            ->count('id');

        $today_total_revenue = DB::table('order_items')
            ->whereDate('created_at', $today)
            ->orderBy('created_at', 'asc')
            ->sum('drink_price');


        //MONTHLY TOTAL ORDER
        $monthly_total_order = DB::table('order_items')
            ->whereMonth('created_at', $this_month)
            ->orderBy('created_at', 'asc')
            ->count('order_id');

        $monthly_total_customer = DB::table('orders')
            ->whereMonth('created_at', $this_month)
            ->orderBy('created_at', 'asc')
            ->count('id');

        $monthly_total_revenue = DB::table('order_items')
            ->whereMonth('created_at', $this_month)
            ->orderBy('created_at', 'asc')
            ->sum('drink_price');


        //YEARLY TOTAL ORDER
        $yearly_total_order = DB::table('order_items')
            ->whereYear('created_at', $this_year)
            ->orderBy('created_at', 'asc')
            ->count('order_id');

        $yearly_total_customer = DB::table('orders')
            ->whereYear('created_at', $this_year)
            ->orderBy('created_at', 'asc')
            ->count('id');

        $yearly_total_revenue = DB::table('order_items')
            ->whereYear('created_at', $this_year)
            ->orderBy('created_at', 'asc')
            ->sum('drink_price');





        return view('modules/home', [
            // 'sale' => $sale,
            // 'total' => $total,
            // 'order' => $order,

            'sample2' => $sample2,
            'sampleq2' => $sampleq2,
            'monthlyChartQuantity' => $monthlyChartQuantity,
            'monthlyChartName' => $monthlyChartName,
            'yearlyChartQuantity' => $yearlyChartQuantity,
            'yearlyChartName' => $yearlyChartName,
            'today_total_order' => $today_total_order,
            'today_total_customer' => $today_total_customer,
            'today_total_revenue' => $today_total_revenue,
            'monthly_total_order' => $monthly_total_order,
            'monthly_total_customer' => $monthly_total_customer,
            'monthly_total_revenue' => $monthly_total_revenue,
            'yearly_total_order' => $yearly_total_order,
            'yearly_total_customer' => $yearly_total_customer,
            'yearly_total_revenue' => $yearly_total_revenue,





        ]);
    }
}
