<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Admin\PageController;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function showLogin() {
        return view('admin.login');
    }

    function login() {
        request()->validate([
            'email'=>"required|email",
            'password'=> "required"
        ]);

        $cre = request()->only('email','password');

        if (auth()->guard('admin')->attempt($cre)) {
            return  redirect('/admin')->with('success',"Welcome Admin");
        }
        return redirect()->back()->with('error',"email and password not match");
    }

    function logout() {
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }

    function showDashboard() {
        return view('admin.dashboard');
    }
}
