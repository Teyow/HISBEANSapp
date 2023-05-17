<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    public function index()
    {
        $employees = DB::table('users')
            ->get();


        return view('modules/users', [
            'employees' => $employees

        ]);
    }

    public function addusers()
    {
        return view('modules/adduser');
    }



    // public function ViewUsers($id)
    // {
    //     $employees = DB::table('users')
    //         ->where('users . id', $id)
    //         ->get();
    // }



    protected function create(Request $request)
    {
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'cnumber' => $request->cnumber,
            'status' => $request->status,
        ]);

        return redirect('/addusers');
        // dd($request->all());
    }

    public function deleteEmployee(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->delete();
        return redirect('/users');
    }

    // public function usersView($id)
    // {
    //     $employee = User::find($id);
    //     return view('modules.usersView', [
    //         'employee' => $employee
    //     ]);
    // }
}
