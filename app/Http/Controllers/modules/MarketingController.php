<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Vouchers;

class MarketingController extends Controller
{

    //VOUCHERS
    public function vouchers()
    {

        $vouchers = DB::table('vouchers')
            ->get();

        return view('modules/vouchers', [
            'vouchers' => $vouchers
        ]);
    }

    // public function viewVoucher($id)
    // {
    //     $vouchers = DB::table('vouchers')
    //         ->where('vouchers . id', $id)
    //         ->get();
    // }

    public function addVoucher()
    {
        return view('modules/addVoucher');
    }


    protected function create(Request $request)
    {
        // dd($request->all());
        Vouchers::create([
            'type_of_voucher' => $request->type_of_voucher,
            'voucher_name' => $request->voucher_name,
            'voucher_code' => $request->voucher_code,
            'minimum_order' => $request->minimum_order,
            'valid_until' => $request->valid_until,
            'promo_details' => $request->promo_details,

        ]);

        return redirect('/vouchers');
    }

    public function deleteVoucher(Request $request)
    {
        DB::table('vouchers')
            ->where('id', $request->id)
            ->delete();
        return redirect('/vouchers');
    }



    //PROMOTIONS
    public function promotions()
    {
        return view('modules/promotions');
    }
    public function Addpromotions()
    {
        return view('modules/AddPromotions');
    }
}
