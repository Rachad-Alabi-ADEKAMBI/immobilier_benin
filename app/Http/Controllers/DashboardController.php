<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdController;

class DashboardController extends Controller
{
    public function index()
    {   
        return view('/pages/back/user/dashboard');
    }
}
