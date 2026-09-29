<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car_Maker;

class Car_MakerController extends Controller
{
    public function index()
    {
        $car_makers = Car_Maker::get();

        return view('car_makers.index', compact('car_makers'));
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

        $car_maker = Car_Maker::create($validated);
        $car_makers= Car_Maker::all();

        return redirect()
            ->route('car_makers.index', compact('car_makers'))
            ->with('status', 'Autó Gyártó létrehozva');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view('car_makers.edit', compact('car_maker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $car_maker->update($validated);

        return redirect()
            ->route('car_makers.index', $car_maker)
            ->with('status', 'Autó Gyártó frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car_maker->delete();

        return redirect()
            ->route('car_makers.index')
            ->with('status', 'Autó Gáyrtó törölve!');
    }
}
