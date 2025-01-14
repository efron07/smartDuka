<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.home');
    }

    public function manageUsers()
    {
        return view('admin.manage_users');
    }
}
