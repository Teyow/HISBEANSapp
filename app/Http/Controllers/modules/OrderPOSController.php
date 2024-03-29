<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Models\Items;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

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
            ->where('role', "Customer")
            ->get();

        $categories = DB::table("category")
            ->where('status', "Enabled")
            ->get();

        $vouchers = DB::table('vouchers')
            ->where('status', "Enable")
            ->get();

        return view('modules/orderMenu', [
            'categories' => $categories,
            "users" => $allUsers,
            'menus' => $menus,
            'order' => $order,
            'vouchers' => $vouchers,
            'addons' => $addons,

        ]);
    }

    public function orderList()
    {
        $menus = DB::table('menu')
            ->get();
        $orders = Order::all();


        return view('modules/orderList', [
            'menus' => $menus,
            'orders' => $orders->sortBy('created_at'),

        ]);
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

    public function addOrder(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user_id,
            'voucher_id' => $request->voucher_id,
            'total_price' => $request->total_price,
            'mode_of_payment' => $request->mode_of_payment,
            'gcash_ref_number' => $request->reference_number,
            'order_status' => $request->order_status,
            'payment_status' => $request->payment_status,
        ]);

        return $order;
    }

    public function addOrderItems(Request $request)
    {
        OrderItem::create([
            'menu_id' => $request->menu_id,
            'order_id' => $request->order_id,
            'addons_id' => $request->addons_id,
            'drink_temperature' => $request->drink_temperature,
            'drink_name' => $request->drink_name,
            'drink_quantity' => $request->drink_quantity,
            'drink_price' => $request->drink_price
        ]);

        $item = Items::where('name', 'Paper Cups')->firstOrFail();

        Items::where('name', 'Paper Cups')
            ->update([
                'quantity' => (int)$item->quantity - 1
            ]);
    }

    public function completeStatus(Request $request)
    {
        $order = DB::table('orders')
            ->where('id', $request->order_id)
            ->update([
                'order_status' => 'Completed'
            ]);
        $messaging = app('firebase.messaging');
        if ($request->deviceToken != null) {
            $deviceToken = $request->deviceToken;
            $message = CloudMessage::withTarget('token', $deviceToken)
                ->withNotification(Notification::create("Your order #$request->order_id is completed!", "Please proceed to the counter to get your drink!"))
                ->withData(['key' => 'value']);

            $messaging->send($message);
        }
    }

    public function deleteOrder(Request $request)
    {
        Order::findOrFail($request->id)
            ->delete();
    }

    public function validatePayment(Request $request)
    {
        Order::findOrFail($request->id)
            ->update([
                'payment_status' => "Completed"
            ]);
    }
}
