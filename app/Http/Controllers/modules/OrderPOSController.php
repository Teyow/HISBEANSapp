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
        $order = DB::table('orders')
            ->get();
        $addons = DB::table('addons')
            ->get();
        $allUsers = DB::table("users")
            ->where('role', 3)
            ->get();

        $categories = DB::table("category")
            ->where('status', "Enabled")
            ->get();

        return view('modules/OrderMenu', [
            'categories' => $categories,
            "users" => $allUsers,
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


        DB::table('order')
            ->insert([
                'id' => $request->id,

                'item_name' => $request->item_name,

                'item_price' => $request->item_price,
                'quantity' => $request->quantity
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

    public function getSpecificAddons(Request $request)
    {
        return DB::table('addons')
            ->where('addons_name', $request->name)
            ->first();
    }
}
