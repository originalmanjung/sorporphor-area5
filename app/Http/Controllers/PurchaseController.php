<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function purchaseAll()
    {
        $purchases = Purchase::orderBy('created_at')->paginate(8);
        return view('purchase.purchaseAll',[
            'purchases' => $purchases
        ]);
    }

    public function purchaseShow($purchase)
    {
        $purchase = Purchase::where('slug', $purchase)->firstOrFail();
        return view('purchase.purchaseShow',[
            'purchase' => $purchase
        ]);
    }
}
