<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    public function index ()
    {   
        $user = User::where('role_as', '0');
        return view('admin.dashboard', compact('user'));
    }
}
