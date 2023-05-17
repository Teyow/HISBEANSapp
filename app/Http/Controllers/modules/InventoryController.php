<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Items;
use Illuminate\Support\Facades\Hash;

class InventoryController extends Controller
{
    public function index()
    {
        $items = DB::table('items')
            ->get();

        return view('modules/inventory', [
            'items' => $items
        ]);
    }

    public function addItem()
    {
        return view('modules/addItems');
    }


    protected function create(Request $request)
    {
        Items::create([
            'name' => $request->name,
            'cost_price' => $request->cost_price,
            'username' => $request->username,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'supplier' => $request->supplier,

        ]);

        return redirect('/addItems');
        // dd($request->all());
    }
}
