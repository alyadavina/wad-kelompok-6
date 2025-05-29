<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::all();
        return view('dashboard', compact('beasiswas'));
    }
}
