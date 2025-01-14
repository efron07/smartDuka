<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('super_admin.home');
    }

    public function settings()
    {
        return view('super_admin.settings');
    }
}
