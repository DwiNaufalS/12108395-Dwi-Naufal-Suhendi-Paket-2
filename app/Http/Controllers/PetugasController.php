<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
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
        return view('petugas.PendataanBarang', compact('Product'));
        // return view('petugas.PendataanBarang');
    }

    public function Pembelian()
    {
        $Customer = Customer::all();
        return view('petugas.Pembelian', compact('Customer'));
        // return view('petugas.Pembelian');
    }

    public function form_customer()
    {
        return view('petugas.form_customer');
    }

    public function form_product()
    {   
        $Product = Product::all();
        return view('petugas.form_product', compact('Product'));
    }

    public function customers(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'no_hp' => 'required',
        ]);

        Customer::create($request->all());
        
        return redirect()->route('Pembelian');
    }

}