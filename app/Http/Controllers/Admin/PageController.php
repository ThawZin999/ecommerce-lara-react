<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Outcome;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;
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
        $todayIncome = Income::whereDay('created_at',date('d'))->sum('amount');
        $todayOutcome = Outcome::whereDay('created_at',date('d'))->sum('amount');
        $userCount = User::count();
        $productCount = Product::count();

        $months = [date('F')];
        $yearMonth = [
            ['year' => date('Y'), 'month' => date('m')]
        ];

        // income outcome
        $dayMonths = [date('F d' )];
        $dayMonthData = [
            ['day' => date('d'), 'month' => date('m')]
        ];


        for($i=1;$i<=5;$i++){
            $months[] = date('F', strtotime("-$i month"));

            $yearMonth[] =  [
               'year'=> date('Y', strtotime("-$i month")),
               'month'=> date('m', strtotime("-$i month")),
            ];

            // income outcome
            $dayMonths[] = date('F d', strtotime("-$i day"));
            $dayMonthData[] =  [
                'day'=> date('d', strtotime("-$i day")),
                'month'=> date('m', strtotime("-$i day")),
             ];
        }

        $saleData = [];
        foreach ($yearMonth as $ym) {

            $saleData[]= ProductOrder::whereYear('created_at', $ym['year'])
            ->whereMonth('created_at', $ym['month'])->count();
        }

        $dailyIncome = [];
        $dailyOutcome = [];

        foreach($dayMonthData as $dm) {
            $dailyIncome[] = Income::whereDay('created_at', $dm['day'])
            ->whereMonth('created_at', $dm['month'])->sum('amount');
            $dailyOutcome[] = Outcome::whereDay('created_at', $dm['day'])
            ->whereMonth('created_at', $dm['month'])->sum('amount');
        }

        $latestUser = User::latest()->take(5)->get();
        $products = Product::where('total_quantity','<', 120)->get();
        // if ($products = null) {
        //     $products = 0;
        // }

        return view('admin.dashboard',
        compact('todayIncome','todayOutcome','userCount','productCount',
        'months','saleData', 'dayMonths', 'dailyIncome', 'dailyOutcome',
    'latestUser','products'));
    }
}

