<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
//import return type view
use Illuminate\View\View;
//import directory Storage
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
        //render view with products
        return view('theme.dashboard');
    }
}
