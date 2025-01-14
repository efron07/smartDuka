<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockPersonController extends Controller
{
    public function dashboard()
    {
        return view('stock.home');
    }

    public function viewInventory()
    {
        return view('stock.inventory');
    }
}
