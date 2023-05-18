<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function editProfile(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'username' => $request->username,
                'cnumber' => $request->cnumber,
            ]);

        $user = DB::table('users')
            ->where('id', $request->id)
            ->first();
        return $user;
    }
}
