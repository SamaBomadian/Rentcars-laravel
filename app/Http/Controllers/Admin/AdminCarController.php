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
    $cars = \App\Models\Car::all();

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

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('images'),
            $imageName
        );

        $data['image'] = $imageName;
    }


    \App\Models\Car::create($data);


    return redirect()
        ->route('cars.index')
        ->with('success','Car Added Successfully');
}
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
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
    'image' => 'nullable|image|mimes:jpg,jpeg,png'
]);
     

       if ($request->hasFile('image')) {

    $imageName = time().'.'.$request->image->extension();

    $request->image->move(
        public_path('images'),
        $imageName
    );

    $data['image'] = $imageName;
}

        $car->update($data);

        return redirect()->route('cars.index')
            ->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully.');
    }
}