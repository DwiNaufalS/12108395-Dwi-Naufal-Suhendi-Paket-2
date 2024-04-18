<?php

namespace App\Exports;

use App\Models\Purchase;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PurchaseExport implements FromView
{
    public function view(): View
    {
        return view('page.exports-employee', [
            'data' => Purchase::all()
        ]);
    }
}

