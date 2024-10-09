<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\TruckSubunit;
use Illuminate\Http\Request;

class TruckSubunitController extends Controller
{
    public function index()
    {
        $subunits = TruckSubunit::with(['mainTruck', 'subunitTruck'])->get();
        return view('subunits.index', compact('subunits'));
    }

    public function create()
    {
        $trucks = Truck::all();
        return view('subunits.create', compact('trucks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_truck' => 'required|exists:trucks,id|different:subunit',
            'subunit' => 'required|exists:trucks,id|different:main_truck',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Check if the main truck is set as its own subunit
        if ($request->main_truck === $request->subunit) {
            return back()->withErrors('A truck cannot be its own subunit.');
        }

        // Check for overlapping dates
        $overlapping = TruckSubunit::where('main_truck', $request->main_truck)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })->exists();

        if ($overlapping) {
            return back()->withErrors('The dates overlap with another subunit for the same main truck.');
        }

        // Check if the subunit already has another assignment during the specified dates
        $subunitOverlapping = TruckSubunit::where('subunit', $request->subunit)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })->exists();

        if ($subunitOverlapping) {
            return back()->withErrors('The subunit is already assigned during the specified dates.');
        }

        TruckSubunit::create($request->all());
        return redirect()->route('subunits.index')->with('success', 'Subunit added successfully.');
    }


    public function edit(TruckSubunit $subunit)
    {
        $trucks = Truck::all();
        return view('subunits.edit', compact('subunit', 'trucks'));
    }

    public function update(Request $request, TruckSubunit $subunit)
    {
        $request->validate([
            'main_truck' => 'required|exists:trucks,id|different:subunit',
            'subunit' => 'required|exists:trucks,id|different:main_truck',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Check if the main truck is set as its own subunit
        if ($request->main_truck === $request->subunit) {
            return back()->withErrors('A truck cannot be its own subunit.');
        }

        // Check for overlapping dates
        $overlapping = TruckSubunit::where('main_truck', $request->main_truck)
            ->where('id', '!=', $subunit->id) // Exclude the current subunit from the query
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })->exists();

        if ($overlapping) {
            return back()->withErrors('The dates overlap with another subunit for the same main truck.');
        }

        // Check if the subunit already has another assignment during the specified dates
        $subunitOverlapping = TruckSubunit::where('subunit', $request->subunit)
            ->where('id', '!=', $subunit->id) // Exclude the current subunit from the query
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })->exists();

        if ($subunitOverlapping) {
            return back()->withErrors('The subunit is already assigned during the specified dates.');
        }

        $subunit->update($request->all());
        return redirect()->route('subunits.index')->with('success', 'Subunit updated successfully.');
    }


    public function destroy(TruckSubunit $subunit)
    {
        $subunit->delete();
        return redirect()->route('subunits.index')->with('success', 'Subunit deleted successfully.');
    }
}
