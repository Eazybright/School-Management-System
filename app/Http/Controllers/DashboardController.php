<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
