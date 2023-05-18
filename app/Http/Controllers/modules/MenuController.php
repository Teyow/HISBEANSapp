<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $menus = DB::table('menu')
            ->get();

        return view('modules/menu', [
            'menus' => $menus
        ]);
    }

    public function addMenu()
    {
        $category = DB::table('category')
            ->where('status', 'Enable')
            ->get();
        return view('modules/addMenu', [
            'category' => $category
        ]);
    }


    protected function create(Request $request)
    {
        // //dd($request->all());
        // Menu::create([
        // 'item_name' => $request->item_name,
        // 'item_description' => $request->item_description,
        // 'price' => $request->price,
        // 'minimum_order' => $request->price,
        // 'category' => $request->category,
        // 'status' => $request->status,

        // ]);

        DB::table('menu')->insert([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'price' => $request->price,
            'category' => $request->category,
            'is_featured' => $request->is_featured,
            'status' => $request->status,

        ]);

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
