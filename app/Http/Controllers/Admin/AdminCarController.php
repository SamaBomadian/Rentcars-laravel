<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminCarController extends Controller
{
    public function index()
{
    $cars = Car::all();

    return view('admin.cars.index', [
        'cars' => $cars
    ]);
}


    public function create()
    {
        return view('admin.cars.create');
    }

public function store(Request $request)
{
     $request->validate([
        'brand' => 'required',
        'model' => 'required',
        'price_per_day' => 'required|numeric',
        'passengers' => 'required|integer',
        'transmission' => 'required',
        'doors' => 'required|integer',
        'air_conditioning' => 'required',
        'status' => 'required',
        'image' => 'nullable|image'
    ]);
    $data = $request->all();
    if ($request->hasFile('image')) {

        $data['image'] =$request->file('image')->store('cars','public');
        }
         Car::create($data);

        return redirect()
        ->route('admin.cars.index')
        ->with('success','Car Added Successfully');
}
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
{
    $data = $request->validate([
        'brand'            => 'required|string|max:255',
        'model'            => 'required|string|max:255',
        'price_per_day'    => 'required|numeric',
        'status'           => 'required|in:available,rented',
        'passengers'       => 'required|integer',
        'transmission'     => 'required|string',
        'doors'            => 'required|integer',
        'air_conditioning' => 'required|boolean',
        'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }

         $data['image']  = $request->file('image')->store('cars', 'public');
    }
    $car->update($data);
    return redirect()->route('admin.cars.index')
        ->with('success', 'Car updated successfully');
}

    public function destroy(Car $car)
    {
         if ($car->image && Storage::disk('public')->exists($car->image))  {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('admin.cars.index')
            ->with('success', 'Car deleted successfully.');
    }
}