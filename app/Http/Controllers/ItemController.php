<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('item_inventory.index');
    }
    public function home()
    {
        return view('item_inventory.home');
    }
    public function create()
    {
        return view('item_inventory.create');
    }

    public function store(Request $request)
    {
        // Validate and store item
    }

    public function edit($item)
    {
        return view('item_inventory.edit', compact('item'));
    }

    public function update(Request $request, $item)
    {
        // Validate and update item
    }

    public function destroy($item)
    {
        // Delete item
    }
}
