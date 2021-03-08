<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    public function index()
    {
        $title = __('dashboard.dashboard');
        return view('dashboard',compact('title'));
    }

    public function changeLang(Request $request)
    {
        // dd($request->get('lang'));
        // App::setLocale($request->get('lang'));
        App::setLocale('en');
        return redirect()->back();
    }

}
