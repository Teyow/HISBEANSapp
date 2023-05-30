<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllMenu()
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
            ->get();
        return $featured;
    }
}
