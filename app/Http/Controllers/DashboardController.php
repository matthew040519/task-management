<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        // You can add logic here to fetch data for the dashboard
        // For now, we'll just return a view
        return view('dashboard.index');
    }
}
