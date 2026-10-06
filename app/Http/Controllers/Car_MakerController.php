<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car_Maker;

class Car_MakerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $car_makers = Car_Maker::withCount('car_types')
            ->when($search, fn ($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy('name')
            ->get();

        return view('car_makers.index', compact('car_makers', 'search'));
    }

    public function create()
    {
        return view('car_makers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Car_Maker::create($validated);

        return redirect()
            ->route('car_makers.index')
            ->with('status', 'Autó Gyártó létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Car_Maker $car_maker)
    {
        return view('car_makers.edit', compact('car_maker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car_Maker $car_maker)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $car_maker->update($validated);

        return redirect()
            ->route('car_makers.index')
            ->with('status', 'Autó Gyártó frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car_Maker $car_maker)
    {
        $car_maker->delete();

        return redirect()
            ->route('car_makers.index')
            ->with('status', 'Autó Gyártó törölve!');
    }
}