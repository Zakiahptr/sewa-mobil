<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rent;
use Illuminate\Http\Request;
use App\Http\Requests\RentRequest;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Car $car)
    {
        return view('rents.create', compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RentRequest $request)
    {

        $data = $request->validated();
        $startDate = $data['start'];
        $endDate = $data['end'];
        $carId = $data['car_id'];
        $availableCars = Car::where('id', $carId)
            ->whereNotIn('id', function ($query) use ($startDate, $endDate) {
                $query->select('car_id')
                ->from('rents')
                ->where(function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('start', [$startDate, $endDate])
                    ->orWhereBetween('end', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('start', '<=', $startDate)
                            ->where('end', '>=', $endDate);
                    });
                });
            })
            ->exists();

        if (!$availableCars) {
            return redirect()->back()->with('status', 'Mobil Tidak Tersedia Pada Rentang Tanggal Tersebut! Silahkan Pilih tanggal lain');
        }
        else {
            $data['user_id'] = auth()->id();
            $data['status'] = 'Dipinjam';
            $toDate = Carbon::parse($data['end']);
            $fromDate = Carbon::parse($data['start']);
            $data['duration'] = $toDate->diffInDays($fromDate);
            $car = Car::find($request->car_id);
            $price= $car->price;
            $data['total_price'] = $data['duration'] * $price;
            Rent::create($data);

            return redirect()->route('rentsHistory.index')->with('status', 'Mobil Berhasil Dipinjam!');
        }

    }



    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
