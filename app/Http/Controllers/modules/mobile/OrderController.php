<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class OrderController extends Controller
{
    public function getUserCart(Request $request)
    {
        return DB::table('menu')
            ->join('carts', 'carts.menu_id', 'menu.id')
            ->where('carts.user_id', $request->id)
            ->get();
    }

    public function addToCart(Request $request)
    {
        DB::table('carts')
            ->insert([
                'user_id' => $request->user_id,
                'menu_id' => $request->menu_id,
                'addons_id' => $request->addons_id,
                'drink_temperature' => $request->drink_temperature,
                'drink_name' => $request->drink_name,
                'drink_price' => $request->drink_price,
                'drink_quantity' => $request->drink_quantity,
            ]);

        return true;
    }

    public function removeToCart(Request $request)
    {
        return $request;
        // DB::table('carts')
        //     ->where('id', $request->)
    }

    public function getItemAddOns(Request $request)
    {
        return DB::table('addons')
            ->where('id', $request->id)
            ->first();
    }

    public function addOrder(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user_id,
            'voucher_id' => $request->voucher_id,
            'total_price' => $request->total_price,
            'mode_of_payment' => $request->mode_of_payment,
            'order_status' => "Pending",
            'payment_status' => "Completed",
        ]);

        $order_items = json_decode($request->order_items);

        foreach ($order_items as $order_item) {
            OrderItem::create([
                'menu_id' => $order_item->menu_id,
                'order_id' => $order->id,
                'addons_id' => $order_item->addons_id,
                'drink_temperature' => $order_item->drink_temperature,
                'drink_name' => $order_item->drink_name,
                'drink_price' => $order_item->drink_price,
                'drink_quantity' => $order_item->drink_quantity,
                'is_favorite' => false
            ]);

            DB::table("carts")
                ->where('id', $order_item->id)
                ->delete();
        }
    }

    public function getUserPendingOrders(Request $request)
    {
        return DB::table('orders')
            ->join('order_items', 'orders.id', 'order_items.order_id')
            ->where("orders.user_id", $request->user_id)
            ->get();
    }

    public function getUserOrders(Request $request)
    {
        return DB::table('orders')
            ->where('user_id', $request->user_id)
            ->get();
    }

    public function getAllCompletedOrders(Request $request)
    {
        return DB::table('orders')
            ->where('user_id', $request->user_id)
            ->where('order_status', "Completed")
            ->get();
    }

    public function getSpecificOrder(Request $request)
    {
        return DB::table('orders')
            ->join('order_items', 'orders.id', 'order_items.order_id')
            ->where('order_items.order_id', $request->id)
            ->where('orders.order_status', '!=', 'Cancelled')
            ->get();
    }

    public function cancelOrder(Request $request)
    {
        return DB::table('orders')
            ->where('id', $request->id)
            ->update([
                'order_status' => 'Cancelled',
                'payment_status' => "Refunded"
            ]);
    }

    public function updateToken(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update(['notification_token' => $request->token]);
        return response('token updated!');
    }

    // DEBUGGING LANG

    public function sendNotif(Request $request)
    {
        $messaging = app('firebase.messaging');
        $deviceToken = $request->deviceToken;
        $title = 'Test Title';
        $body = 'Test Body';
        $notification = Notification::fromArray([
            'title' => $title,
            'body' => $body,
        ]);
        $message = CloudMessage::withTarget('token', $deviceToken)
            ->withNotification(Notification::create('Your order has been completed!', "Please proceed to the counter to get your drink!"))
            ->withData(['key' => 'value']);

        $messaging->send($message);
    }
    // DEBUGGING LANG
}
