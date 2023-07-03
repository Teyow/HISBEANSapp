<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;

class FavoritesController extends Controller
{
    public function addToFavorites(Request $request)
    {
        DB::table("order_items")
            ->where('id', $request->id)
            ->update([
                'is_favorite' => true
            ]);
    }

    public function removeToFavorites(Request $request)
    {
        DB::table("order_items")
            ->where('id', $request->id)
            ->update([
                'is_favorite' => false
            ]);
    }

    public function getUserFavorites(Request $request)
    {
        return DB::table('order_items')
            ->join('orders', 'order_items.order_id', 'orders.id')
            ->join('menu', 'menu.id', 'order_items.menu_id')
            ->where('orders.user_id', $request->user_id)
            ->where('order_items.is_favorite', 1)
            ->get();
    }
}
