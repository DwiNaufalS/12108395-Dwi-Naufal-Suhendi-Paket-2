<?php

namespace App\Http\Controllers;

use App\Exports\PurchaseExport;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;
use Dompdf\Options;

use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Purchase::all();
        $product = Product::all();
        return view('purchase.purchase', compact('data', 'product'));
    }

    public function downloadExcel()
    {
        return Excel::download(new PurchaseExport, 'purchase.xlsx');
    }

    public function pagePurchaseEmployee()
    {
        $data = Purchase::all();
        $product = Product::all();
        return view('Employee.purchase_employee', compact('data', 'product'));
    }

    public function downloadPdf($id)
{
    // Retrieve purchase details by ID
    $purchase = Purchase::findOrFail($id);

    // Load view for purchase detail
    $html = view('pdf', compact('purchase'))->render();

    // Setup Dompdf options
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);

    // Instantiate Dompdf with options
    $dompdf = new Dompdf($options);

    // Load HTML content into Dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF
    $dompdf->render();

    // Output PDF to browser
    return $dompdf->stream('purchase_detail.pdf');
}

    // public function CetakPDF()
    // {
    //     $purchase = Purchase::get();

    //     $data = [
    //         'title' => 'Welcome to ItSolutionStuff.com',
    //         'date' => date('m/d/Y'),
    //         'users' => $purchase
    //     ]; 

    //     $pdf = PDF::loadView('myPDF', $data);

    //     return $pdf->download('itsolutionstuff.pdf');
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',

            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required'
        ]);


        $customer = new Customer();

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->save();

        $purchase = new Purchase();
        $purchase->user_id = Auth::user()->id;
        $purchase->customer_id = $customer->id;
        $purchase->total_purchase = $request->total_purchase;
        $purchase->save();

        // Simpan detail produk yang dibeli
        foreach ($request->products as $product) {
            $purchase->products()->attach($product['product_id'], [
                'quantity' => $product['quantity'],
                'totalPrice' => $product['totalPrice'],
                'unit_price' => $product['price']
            ]);

            $oldProduct = Product::find($product['product_id']);
            $oldProduct->update([
                'stock' => $oldProduct->stock - $product['quantity']
            ]);
        }
        return redirect()->back()->with('success', 'Purchase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
