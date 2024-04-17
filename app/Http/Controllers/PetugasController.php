<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        return view('petugas.dashboard');
    }

    public function PendataanBarang()
    {
        $Product = Product::all();
        return view('petugas.PendataanBarang', compact('Produk'));
        return view('petugas.PendataanBarang');
    }

    public function StokBarang()
    {
        return view('petugas.StokBarang');
    }
}
