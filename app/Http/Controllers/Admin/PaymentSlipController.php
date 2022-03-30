<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentSlip;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentSlip\StorePaymentSlipRequest;
use App\Http\Requests\PaymentSlip\UpdatePaymentSlipRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class PaymentSlipController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(PaymentSlip::class, 'paymentSlip');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.paymentSlips.index');
        $paymentSlips = PaymentSlip::orderBy('created_at', 'desc')->get();
        return view('admin.paymentSlip.index',[
            'paymentSlips' => $paymentSlips
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.paymentSlips.create');
        return view('admin.paymentSlip.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentSlipRequest $request)
    {
        Gate::authorize('app.paymentSlips.create');
        $paymentSlip = new PaymentSlip;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            paymentSlip::UploadFile($file, $paymentSlip);
        }
        $paymentSlip->name = $request->name;
        $paymentSlip->description = $request->description;
        $paymentSlip->save();
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.paymentSlips.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentSlip  $paymentSlip
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentSlip $paymentSlip)
    {
        return view('admin.paymentSlip.show',[
            'paymentSlip' => $paymentSlip
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentSlip  $paymentSlip
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentSlip $paymentSlip)
    {
        Gate::authorize('app.paymentSlips.edit');
        return view('admin.paymentSlip.form',[
            'paymentSlip' => $paymentSlip
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentSlip  $paymentSlip
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentSlipRequest $request, PaymentSlip $paymentSlip)
    {
        Gate::authorize('app.paymentSlips.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            PaymentSlip::UploadFile($file, $paymentSlip);
        }
        $paymentSlip->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.paymentSlips.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentSlip  $paymentSlip
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentSlip $paymentSlip)
    {
        Gate::authorize('app.paymentSlips.destroy');
        if (Storage::exists('public/paymentSlip_files/'.$paymentSlip->file)) {
            Storage::delete('public/paymentSlip_files/'.$paymentSlip->file);
            $paymentSlip->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
