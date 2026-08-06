<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search;

        if ($search) {
            $cars = Car::where('brand', 'like', "%$search%")
                ->orWhere('model', 'like', "%$search%")
                ->get();
        } else {
            $cars = Car::all();
        }

        return view('cars.index', compact('cars', 'search'));
    }
    public function show($id)
{
    $car = Car::findOrFail($id);
    return view('cars.show', compact('car'));
}

}