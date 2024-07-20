<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMobil;
use App\Models\DataSewa;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function show($id)
    {
        $car = DataMobil::findOrFail($id);
        return view('checkout', compact('car'));
    }

    // Menyimpan data checkout
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:data_mobils,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $dataMobil = DataMobil::find($request->car_id);

        DataSewa::create([
            'car_id' => $dataMobil->id,
            'car_name' => $dataMobil->Mobil_Name,
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('success');
    }

    // Menampilkan halaman sukses setelah checkout
    public function success()
    {
        return view('success');
    }
}


