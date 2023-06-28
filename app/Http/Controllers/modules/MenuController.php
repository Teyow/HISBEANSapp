<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = DB::table('menu')
            ->get();
        $orders = DB::table('users')
            ->join('orders', 'users.id', 'orders.user_id')
            ->get();
        $items = DB::table('items')
            ->get();

        return view('modules/menu', [
            'menus' => $menus,
            'orders' => $orders,
            'items' => $items
        ]);
    }

    public function addMenu()
    {
        $category = DB::table('category')
            ->where('status', 'Enable')
            ->get();
        $items = DB::table('items')
            ->get();
        // dd($category);
        return view('modules/addMenu', [
            'category' => $category,
            'items' => $items
        ]);
    }


    protected function create(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->item_name . '.' .
            $request->image->extension();
        $request->image->move(public_path('image/menu'), $newImageName);





        DB::table('menu')->insert([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'price' => $request->price,
            'category' => $request->category,
            'is_featured' => $request->is_featured,
            'status' => $request->status,
            'image_path' => $newImageName,


        ]);

        return redirect('/menu');
    }

    public function editMenu($id)

    {


        $menu = DB::table('menu')
            ->where('id', $id)
            ->first();

        $category = DB::table('category')
            ->where('status', 'Enable')
            ->get();

        $items = DB::table('items')
            ->get();

        return view('modules.editMenu', [
            'menu' => $menu,
            'category' => $category,
            'items' => $items
        ]);
    }

    public function updateMenu(Request $request, $id)
    {




        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->item_name . '.' . $request->image->extension();
            $request->image->move(public_path('image/menu'), $newImageName);
            $menu = DB::table('menu')
                ->where('id', $id)
                ->update([
                    'item_name' => $request->item_name,
                    'item_description' => $request->item_description,
                    'price' => $request->price,
                    'category' => $request->category,
                    'is_featured' => $request->is_featured,
                    'status' => $request->status,
                    'image_path' => $newImageName,

                ]);
        } else {
            $menu = DB::table('menu')
                ->where('id', $id)
                ->update([
                    'item_name' => $request->item_name,
                    'item_description' => $request->item_description,
                    'price' => $request->price,
                    'category' => $request->category,
                    'is_featured' => $request->is_featured,
                    'status' => $request->status,
                    // 'image_path' => $request->image,

                ]);
        }
        return redirect('/menu');
    }

    public function deleteMenu(Request $request)
    {
        DB::table('menu')
            ->where('id', $request->id)
            ->delete();

        return redirect('/menu');
    }
}
