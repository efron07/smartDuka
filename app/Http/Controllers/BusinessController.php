<?php
namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::all();
        return view('businesses.index', compact('businesses'));
    }

    public function create()
    {
        return view('businesses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'physical_location' => 'required|string|max:255',
            'email' => 'required|email|unique:businesses',
            'telephone_number' => 'required|string|max:20',
            'tin' => 'nullable|string|max:50',
            'vrn' => 'nullable|string|max:50',
            'po_box' => 'nullable|string|max:50',
            'footer_description' => 'nullable|string',
            'period' => 'nullable|string|max:50',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Business::create($validated);

        return redirect()->route('businesses.index')->with('success', 'Business created successfully.');
    }

    public function edit(Business $business)
    {
        return view('businesses.edit', compact('business'));
    }

    public function update(Request $request, Business $business)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'physical_location' => 'required|string|max:255',
            'email' => 'required|email|unique:businesses,email,' . $business->id,
            'telephone_number' => 'required|string|max:20',
            'tin' => 'nullable|string|max:50',
            'vrn' => 'nullable|string|max:50',
            'po_box' => 'nullable|string|max:50',
            'footer_description' => 'nullable|string',
            'period' => 'nullable|string|max:50',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $business->update($validated);

        return redirect()->route('businesses.index')->with('success', 'Business updated successfully.');
    }

    public function destroy(Business $business)
    {
        if ($business->logo) {
            \Storage::disk('public')->delete($business->logo);
        }

        $business->delete();

        return redirect()->route('businesses.index')->with('success', 'Business deleted successfully.');
    }
}
