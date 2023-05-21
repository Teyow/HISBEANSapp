<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        dd($request->all());
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
}
