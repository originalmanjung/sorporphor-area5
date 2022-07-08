<?php

namespace App\Http\Controllers;

use App\Models\PaymentSlip;
use Illuminate\Http\Request;

class PaymentSlipController extends Controller
{
    public function paymentSlipAll()
    {
        $paymentSlips = paymentSlip::latest()->paginate(8);
        return view('paymentSlip.paymentSlipAll',[
            'paymentSlips' => $paymentSlips
        ]);
    }

    public function paymentSlipShow($paymentSlip)
    {
        $paymentSlip = paymentSlip::where('slug', $paymentSlip)->firstOrFail();
        return view('paymentSlip.paymentSlipShow',[
            'paymentSlip' => $paymentSlip
        ]);
    }
}
