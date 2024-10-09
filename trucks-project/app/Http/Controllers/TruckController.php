<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::all();
        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_number' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,' . (date('Y') + 5),
        ]);

        Truck::create($request->all());
        return redirect()->route('trucks.index')->with('success', 'Truck created successfully.');
    }

    public function edit(Truck $truck)
    {
        return view('trucks.edit', compact('truck'));
    }

    public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'unit_number' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,' . (date('Y') + 5),
        ]);

        $truck->update($request->all());
        return redirect()->route('trucks.index')->with('success', 'Truck updated successfully.');
    }

    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('trucks.index')->with('success', 'Truck deleted successfully.');
    }
}

