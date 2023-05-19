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
        $menu = DB::table('menu')
            ->get();
        return $menu;
    }

    public function getAllFeatured()
    {
        $featured = DB::table('menu')
            ->where('is_featured', "Featured")
            ->get();
        return $featured;
    }
}
