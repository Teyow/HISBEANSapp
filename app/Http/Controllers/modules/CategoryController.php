<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        return redirect('/category');
    }

    public function editCategory($id)
    {
        $categories = DB::table('category')
            ->where('id', $id)
            ->first();

        return view('modules.editCategory', [
            'categories' => $categories
        ]);
    }

    public function updateCategory(Request $request, $id)
    {
        $categories = DB::table('category')
            ->where('id', $id)
            ->update([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
                'status' => $request->status
            ]);
        // Category::where('id', $id)->update([

        // ]);

        return redirect('/category');
    }

    public function deleteCategory(Request $request)
    {
        DB::table('category')
            ->where('id', $request->id)
            ->delete();
        return redirect('/category');
    }
}
