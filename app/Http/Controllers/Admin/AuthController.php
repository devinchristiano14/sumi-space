<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        if(!Session::has('admin'))
        {
            return redirect('/admin/login');
        }

        return view('admin.dashboard');
    }

    public function authenticate(Request $request)
    {
        $admin = Admin::where('username',$request->username)->first();

        if(!$admin)
        {
            return back()->with('error','Username tidak ditemukan');
        }

        if(!Hash::check($request->password,$admin->password))
        {
            return back()->with('error','Password salah');
        }

        Session::put('admin',$admin);

        return redirect('/admin/dashboard');
    }

    public function logout()
    {
        Session::forget('admin');

        return redirect('/admin/login');
    }
}
