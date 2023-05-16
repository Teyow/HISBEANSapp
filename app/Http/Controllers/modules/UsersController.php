<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;

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



    public function ViewUsers($id)
    {
        $employees = DB::table('users')
            ->where('users . id', $id)
            ->get();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
            'cnumber' => ['required', 'integer', 'max:10'],
            'status' => ['required', 'string'],
        ]);
    }

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
    }
}
