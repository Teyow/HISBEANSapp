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
            ->orderBy('name', 'desc')
            ->groupBy('menu.item_name')
            ->take(10)
            ->get();

        $sampleq2 = $sampleq->mapWithKeys(function ($item, $key) {
            return [$item->name => $item->quantity];
        });


        $sale = DB::table('orders')
            ->count('id');



        $order = DB::table('order_items')

            ->count("id");

        // $a = OrderItem::withCount('drink_name')
        //     ->orderByDesc('quantity')
        //     ->take(10)
        //     ->get();
        // dd($a);



        $total = DB::table('orders')
            ->where('payment_status', 'Completed')
            ->sum('total_price');


        $topProducts = DB::table('order_items')
            ->where('drink_name', 'Americano')

            // ->orWhere('drink_name', 'Cafe Latte')
            // ->orWhere('drink_name', 'Vanilla Latte')
            // ->get('drink_name');
            ->count();


        //Products sold Analysis on Coffee
        $americano = DB::table('order_items')
            ->where('drink_name', 'Americano')
            ->count("menu_id");

        $cafelatte = DB::table('order_items')
            ->where('drink_name', 'Cafe Latte')
            ->count("menu_id");


        $cappuccino = DB::table('order_items')
            ->where('drink_name', 'Cappuccino')
            ->count("menu_id");


        $caramel_macchiato = DB::table('order_items')
            ->where('drink_name', 'Caramel Macchiato')
            ->count("menu_id");


        $cafe_mocha = DB::table('order_items')
            ->where('drink_name', 'Cafe Mocha')
            ->count("menu_id");


        $vanilla_latte = DB::table('order_items')
            ->where('drink_name', 'Vanilla Latte')
            ->count("menu_id");


        $spanish_latte = DB::table('order_items')
            ->where('drink_name', 'Spanish Latte')
            ->count("menu_id");


        $cold_brew = DB::table('order_items')
            ->where('drink_name', 'Cold Brew')
            ->count("menu_id");


        $cold_brew_latte = DB::table('order_items')
            ->where('drink_name', 'Cold Brew Latte')
            ->count("menu_id");


        $einispanner = DB::table('order_items')
            ->where('drink_name', 'Einispanner')
            ->count("menu_id");


        $einispanner_latte = DB::table('order_items')
            ->where('drink_name', 'Einispanner Latte')
            ->count("menu_id");



        //Products sold by Quantity Analysis on Coffee
        $americano_quantity = DB::table('order_items')
            ->where('drink_name', 'Americano')
            ->sum("drink_quantity");

        $cafelatte_quantity = DB::table('order_items')
            ->where('drink_name', 'Cafe Latte')
            ->sum("drink_quantity");

        $cappuccino_quantity = DB::table('order_items')
            ->where('drink_name', 'Cappuccino')
            ->sum("drink_quantity");

        $caramel_macchiato_quantity = DB::table('order_items')
            ->where('drink_name', 'Caramel Macchiato')
            ->sum("drink_quantity");

        $cafe_mocha_quantity = DB::table('order_items')
            ->where('drink_name', 'Cafe Mocha')
            ->sum("drink_quantity");

        $vanilla_latte_quantity = DB::table('order_items')
            ->where('drink_name', 'Vanilla Latte')
            ->sum("drink_quantity");

        $spanish_latte_quantity = DB::table('order_items')
            ->where('drink_name', 'Spanish Latte')
            ->sum("drink_quantity");

        $cold_brew_quantity = DB::table('order_items')
            ->where('drink_name', 'Cold Brew')
            ->sum("drink_quantity");

        $cold_brew_latte_quantity = DB::table('order_items')
            ->where('drink_name', 'Cold Brew Latte')
            ->sum("drink_quantity");

        $einispanner_quantity = DB::table('order_items')
            ->where('drink_name', 'Einispanner')
            ->sum("drink_quantity");

        $einispanner_latte_quantity = DB::table('order_items')
            ->where('drink_name', 'Einispanner Latte')
            ->sum("drink_quantity");



        //Products sold Analysis on Non Coffee
        $chocolate_latte = DB::table('order_items')
            ->where('drink_name', 'Chocolate Latte')
            ->count("menu_id");

        $earl_grey_latte = DB::table('order_items')
            ->where('drink_name', 'Earl Grey Latte')
            ->count("menu_id");

        $greentea_latte = DB::table('order_items')
            ->where('drink_name', 'Greentea Latte')
            ->count("menu_id");

        $real_strawberry_latte = DB::table('order_items')
            ->where('drink_name', 'Real Strawberry Latte')
            ->count("menu_id");


        //Products sold by Quantity Analysis on Coffee
        $chocolate_latte_quantity = DB::table('order_items')
            ->where('drink_name', 'Chocolate Latte')
            ->sum("drink_quantity");

        $earl_grey_latte_quantity = DB::table('order_items')
            ->where('drink_name', 'Earl Grey Latte')
            ->sum("drink_quantity");

        $greentea_latte_quantity = DB::table('order_items')
            ->where('drink_name', 'Greentea Latte')
            ->sum("drink_quantity");

        $real_strawberry_latte_quantity = DB::table('order_items')
            ->where('drink_name', 'Real Strawberry Latte')
            ->sum("drink_quantity");




        return view('modules/home', [
            'sale' => $sale,
            'total' => $total,
            'order' => $order,
            'americano' => $americano,
            'cafelatte' => $cafelatte,
            'cappuccino' => $cappuccino,
            "caramel_macchiato" => $caramel_macchiato,
            "cafe_mocha" => $cafe_mocha,
            "vanilla_latte" => $vanilla_latte,
            "spanish_latte" => $spanish_latte,
            "cold_brew" => $cold_brew,
            "cold_brew_latte" => $cold_brew_latte,
            "einispanner" => $einispanner,
            "einispanner_latte" => $einispanner_latte,
            'americano_quantity' => $americano_quantity,
            'cafelatte_quantity' => $cafelatte_quantity,
            'cappuccino_quantity' => $cappuccino_quantity,
            "caramel_macchiato_quantity" => $caramel_macchiato_quantity,
            "cafe_mocha_quantity" => $cafe_mocha_quantity,
            "vanilla_latte_quantity" => $vanilla_latte_quantity,
            "spanish_latte_quantity" => $spanish_latte_quantity,
            "cold_brew_quantity" => $cold_brew_quantity,
            "cold_brew_latte_quantity" => $cold_brew_latte_quantity,
            "einispanner_quantity" =>   $einispanner_quantity,
            "einispanner_latte_quantity" => $einispanner_latte_quantity,
            'chocolate_latte' => $chocolate_latte,
            'earl_grey_latte' => $earl_grey_latte,
            'greentea_latte' => $greentea_latte,
            'real_strawberry_latte' => $real_strawberry_latte,
            'chocolate_latte_quantity' => $chocolate_latte_quantity,
            'earl_grey_latte_quantity' => $earl_grey_latte_quantity,
            'greentea_latte_quantity' => $greentea_latte_quantity,
            'real_strawberry_latte_quantity' => $real_strawberry_latte_quantity,
            'sample2' => $sample2,
            'sampleq2' => $sampleq2,
            'topProducts' => $topProducts,




        ]);
    }
}
