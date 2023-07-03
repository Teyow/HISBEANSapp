<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function getAllMenu()
    {
        return DB::table('category')
            ->where('status', 'Enable')
            ->get();
    }

    public function getAllCategories()
    {
        return DB::table('category')
            ->get();
    }

    public function getSpecificCategory($category)
    {
        return DB::table('menu')
            ->where('category', $category)
            ->get();
    }

    public function getAllFeatured()
    {
        $featured = DB::table('menu')
            ->where('is_featured', "Featured")
            ->where('status', 'Enable')
            ->get();
        return $featured;
    }

    public function getSpecificMenu(Request $request)
    {
        return DB::table('menu')
            ->where("id", $request->id)
            ->first();
    }
}
