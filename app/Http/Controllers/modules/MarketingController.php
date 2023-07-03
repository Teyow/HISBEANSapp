<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Promotions;

use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

use App\Models\Vouchers;

class MarketingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //VOUCHERS
    public function vouchers()
    {

        $vouchers = DB::table('vouchers')
            ->get();
        $items = DB::table('items')
            ->get();

        return view('modules/vouchers', [
            'vouchers' => $vouchers,
            'items' => $items
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
        $items = DB::table('items')
            ->get();
        return view('modules/addVoucher', [
            'items' => $items,
        ]);
    }


    protected function create(Request $request)
    {
        // dd($request->all());
        $voucher = Vouchers::create([
            'type_of_voucher' => $request->type_of_voucher,
            'voucher_name' => $request->voucher_name,
            'voucher_code' => $request->voucher_code,
            'minimum_order' => $request->minimum_order,
            'valid_until' => $request->valid_until,
            'promo_details' => $request->promo_details,
            'status' => $request->status,

        ]);
        $users = DB::table('users')
            ->whereNotNull('notification_token')
            ->get();

        $messaging = app('firebase.messaging');
        foreach ($users as $user) {
            $deviceToken = $user->notification_token;
            $message = CloudMessage::withTarget('token', $deviceToken)
                ->withNotification(Notification::create("Claim a new voucher!", "A new voucher is available at right now! Use the code $voucher->voucher_code to claim."))
                ->withData(['key' => 'value']);
            $messaging->send($message);
        }


        return redirect('/vouchers');
    }

    public function editVoucher($id)
    {
        $vouchers = DB::table('vouchers')
            ->where('id', $id)
            ->first();

        return view('modules.editVoucher', [
            'vouchers' => $vouchers,

        ]);
    }

    public function updateVoucher(Request $request, $id)
    {
        Vouchers::where('id', $id)->update([
            'type_of_voucher' => $request->type_of_voucher,
            'voucher_name' => $request->voucher_name,
            'voucher_code' => $request->voucher_code,
            'minimum_order' => $request->minimum_order,
            'valid_until' => $request->valid_until,
            'promo_details' => $request->promo_details,
            'status' => $request->status

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
        $promos = DB::table('promotion')
            ->get();


        return view('modules/promotions', [
            'promos' => $promos,

        ]);
    }
    public function Addpromotions()
    {
        $items = DB::table('items')
            ->get();
        return view('modules/addPromotions', [
            'items' => $items
        ]);
    }

    public function createPromo(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' .
            $request->image->extension();
        $request->image->move(public_path('image/promo'), $newImageName);



        $promotion = DB::table('promotion')->insert([
            'name' => $request->name,
            'image_path' => $newImageName,
            'details' => $request->details,
            'status' => $request->status,

        ]);

        $users = DB::table('users')
            ->whereNotNull('notification_token')
            ->get();

        $messaging = app('firebase.messaging');
        foreach ($users as $user) {
            $deviceToken = $user->notification_token;
            $message = CloudMessage::withTarget('token', $deviceToken)
                ->withNotification(Notification::create("New Promotion Available!", "Open the app now to view our latest promotion!"))
                ->withData(['key' => 'value']);
            $messaging->send($message);
        }
        // $items = DB::table('items')
        //     ->get();



        return redirect('/promotions');
    }

    public function editPromo($id)
    {
        $promos = DB::table('promotion')
            ->where('id', $id)
            ->first();
        $items = DB::table('items')
            ->get();

        return view('modules.editPromo', [
            'promos' => $promos,
            'items' => $items
        ]);
    }

    public function updatePromo(Request $request, $id)
    {

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('image/promo'), $newImageName);
            $promo = DB::table('promotion')
                ->where('id', $id)
                ->update([
                    'image_path' => $newImageName,
                    'name' => $request->name,
                    'details' => $request->details,
                    'status' => $request->status
                ]);
        } else {
            $promo = DB::table('promotion')
                ->where('id', $id)
                ->update([
                    // 'image' => $request->image,
                    'name' => $request->name,
                    'details' => $request->details,
                    'status' => $request->status
                ]);
        }

        return redirect('/promotions');
    }

    public function deletePromo(Request $request)
    {
        DB::table('promotion')
            ->where('id', $request->id)
            ->delete();

        return redirect('/promotions');
    }
}
