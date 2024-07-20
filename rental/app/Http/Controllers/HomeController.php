<?php

namespace App\Http\Controllers;

use App\Models\DataMobil;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){

        $cars = DataMobil::orderBy('created_at', 'desc')->take(3)->get();
        return view('index', compact('cars'));
    }
}
