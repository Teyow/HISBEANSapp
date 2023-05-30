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
        return view('modules/OrderMenu', [
            'menus' => $menus
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
        dd($request);
    }
}
