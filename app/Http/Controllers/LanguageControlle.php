<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageControlle extends Controller
{
    public function changeLanguage($locale)
{
   session()->put('locale',$locale);
   return redirect()->back();
}
}
