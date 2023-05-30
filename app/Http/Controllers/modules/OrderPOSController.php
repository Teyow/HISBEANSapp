<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use PDF;

class OrderPOSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        return view('modules/orderPOS');
    }

    public function loginPINCODE(Request $request)
    {


        $request->validate([
            'pincode' => 'required',
        ]);

        $credentials = $request->only('pincode');
        if (Auth::attempt($credentials)) {

            return redirect('/order');
        } else {
            return redirect('/orderPOS');
        }
    }

    public function OrderMenu()
    {
        $menus = DB::table('menu')
            ->get();
        $order = DB::table('order')
            ->get();
        $addons = DB::table('addons')
            ->get();

        return view('modules/OrderMenu', [
            'menus' => $menus,
            'order' => $order,
            'addons' => $addons
        ]);
    }

    public function PayOrder()
    {
        return view('modules/PayOrder');
    }

    public function PrintReceipt()
    {
        $pdf = PDF::loadview('modules.printReceipt');
        return $pdf->download('weekly_reports.pdf');
    }

    public function CreateOrder(Request $request)
    {


        DB::table('order')->insert([
            'item_name' => $request->item_name,
            // 'price' => $request->price,
            // 'quatity' => $request->quantity
        ]);

        return redirect('/OrderMenu');
    }

    public function CreateAddons(Request $request)
    {

        DB::table('addons')->insert([
            'addons_name' => $request->addons_name,

            'price' => $request->price,

        ]);

        return redirect('/OrderMenu');
    }
}
