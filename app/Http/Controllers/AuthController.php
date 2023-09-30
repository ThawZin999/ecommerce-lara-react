<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function showLogin() {
        return view('auth.login');
    }

    function postLogin(Request $request) {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error',"Email Not Found");
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error',"Wrong Password");
        }

        auth()->login($user);
        return redirect('/')->with('success', "Welcome ". $user->name);
    }
    function showRegister() {
        return view('auth.register');
    }

    function postRegister(Request $request) {
       request()->validate([
        'name' => "required",
        'phone' => "required",
        'email' => "required|email",
        'password' => "required",
        'image' => "required|mimes:png,jpg",
        'address' => "required",
       ]);

    //    check email already exists

       $finduser = User::where('email', request()->email)->first();
       if ($finduser) {
        return redirect()->back()->with('error',"Email already Exists");
       }

       $file = request()->file('image');
       $file_name = uniqid() . $file->getClientOriginalName();
       $file->move(public_path('/images'), $file_name);

        $user = User::create([
        'image' => $file_name,
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'address' => $request->address,
       ]);

       auth()->login($user);
       return redirect('/')->with('success', "Welcome ". $user->name);

    }

    function logout(Request $request) {
        auth()->logout();
        return redirect('/')->with('success','Logout Successfully');
    }
}
