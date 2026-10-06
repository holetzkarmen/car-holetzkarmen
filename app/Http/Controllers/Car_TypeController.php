<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car_Type;
use App\Models\Car_Maker;

class Car_TypeController extends Controller
{
    public function index(Request $request)
    {
        $search       = $request->input('search');
        $car_maker_id = $request->input('car_maker_id');

        $car_types = Car_Type::with('car_maker')
            ->when($search, fn ($q) => $q->where('name', 'like', "%{$search}%"))
            ->when($car_maker_id, fn ($q) => $q->where('car_maker_id', $car_maker_id))
            ->orderBy('name')
            ->get();

        $car_makers = Car_Maker::orderBy('name')->get();

        return view('car_types.index', compact('car_types', 'car_makers', 'search', 'car_maker_id'));
    }

    public function create()
    {
        $car_makers = Car_Maker::all();

        return view('car_types.create', compact('car_makers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:20'],
            'car_maker_id' => ['required', 'exists:car_makers,id']
        ]);

        Car_Type::create($validated);

        return redirect()
            ->route('car_types.index')
            ->with('status', 'Autó modell létrehozva!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Car_Type $car_type)
    {
        $car_makers = Car_Maker::all();

        return view('car_types.edit', compact('car_type', 'car_makers'));
    }

    public function update(Request $request, Car_Type $car_type)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:20'],
            'car_maker_id' => ['required', 'exists:car_makers,id']
        ]);

        $car_type->update($validated);

        return redirect()
            ->route('car_types.index')
            ->with('status', 'Autó modell frissítve!');
    }

    public function destroy(Car_Type $car_type)
    {
        $car_type->delete();

        return redirect()
            ->route('car_types.index')
            ->with('status', 'Autó modell törölve!');
    }
}