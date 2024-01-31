<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RentRequest;

class HistoryController extends Controller
{
    public function index(User $user)
    {
        $rents = Rent::where('user_id', auth()->user()->id)->latest()->get();
        return view('rents.history', compact('rents', 'user'));
    }

    public function detail(Rent $rent)
    {
        return view('rents.historyDetail', compact('rent'));
    }

    public function return(Rent $rent, RentRequest $request)
    {
        $data = $request->validated();
        $data['status'] = "Sudah Dikembalikan";
        $rent->update($data);

        return redirect()->route('rentsHistory.index')->with('status', 'Mobil Berhasil Dikembalikan !');
    }

}
