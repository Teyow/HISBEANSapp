<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Items;
use Illuminate\Support\Facades\Hash;
use PDF;

class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'supplier' => $request->supplier,

        ]);
        return redirect('/inventory')
            ->with('message', 'Item has been added to inventory!');


        // dd($request->all());
    }

    public function PrintInventory()
    {
        $iventory = DB::table('items')
            ->get();

        $pdf = PDF::loadview('modules.printInventory', [
            'inventory' => $iventory
        ]);
        return $pdf->download('inventory.pdf');
    }

    public function editInventory($id)
    {
        $items = DB::table('items')
            ->where('id', $id)
            ->first();

        return view('modules.editInventory', [
            'items' => $items
        ]);
    }

    public function updateInventory(Request $request, $id)
    {
        Items::where('id', $id)->update([
            'name' => $request->name,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'supplier' => $request->supplier,

        ]);

        return redirect('/inventory');
    }

    public function deleteInventory(Request $request)
    {
        DB::table('items')
            ->where('id', $request->id)
            ->delete();
        return redirect('/inventory');
    }
}
