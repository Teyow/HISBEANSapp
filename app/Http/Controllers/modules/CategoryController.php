<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories =  DB::table('category')
            ->get();
        return view('modules/category', [
            'categories' => $categories
        ]);
    }

    public function addCategory()
    {
        return view('modules.addCategory');
    }

    protected function create(Request $request)
    {
        DB::table('category')->insert([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'status' => $request->status
        ]);
        return redirect('/addCategory');
    }
}
