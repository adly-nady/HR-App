<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.Dashbord');
    }

    public function laravel()
    {
        return view('welcome');
    }
}
