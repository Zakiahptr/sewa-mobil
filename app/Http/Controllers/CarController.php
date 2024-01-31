<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $cars = Car::where('user_id', auth()->user()->id)->latest()->get();
        return view('cars.index', compact('cars', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $img = $request->file('img')->store(Car::IMAGE_PATH);
        $data['img'] = $img;
        Car::create($data);

        return redirect()->route('cars.index')->with('status', 'Mobil Berhasil Ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $this->authorize('owner', $car);
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Car $car, CarRequest $request)
    {
        $this->authorize('owner', $car);
        $data = $request->validated();
        if ($request->hasFile('img')) {
            Storage::delete($car->img);
            $data['img'] = $request->file('img')->store(Car::IMAGE_PATH);
         }
        $car->update($data);

        return redirect()->route('cars.index')->with('status', 'Data Mobil Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $this->authorize('owner', $car);
        Storage::delete($car->img);
        $car->delete();

        return redirect()->route('cars.index')->with('status', 'Data Mobil Berhasil Dihapus!');
    }
}
