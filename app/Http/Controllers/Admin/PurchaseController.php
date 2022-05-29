<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Requests\Purchase\StorePurchaseRequest;
use App\Http\Requests\Purchase\UpdatePurchaseRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class PurchaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Purchase::class, 'purchase');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::orderBy('created_at', 'desc')->get();
        return view('admin.purchase.index',[
            'purchases' => $purchases
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.purchases.create');
        return view('admin.purchase.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseRequest $request)
    {
        Gate::authorize('app.purchases.create');
        $purchase = new Purchase;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            Purchase::UploadFile($file, $purchase);
        }
        $purchase->user_id = auth()->user()->id;
        $purchase->name = $request->name;
        $purchase->description = $request->description;
        $purchase->save();
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('admin.purchase.show',[
            'purchase' => $purchase
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        Gate::authorize('app.purchases.edit');
        return view('admin.purchase.form',[
            'purchase' => $purchase
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        Gate::authorize('app.purchases.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            Purchase::UploadFile($file, $purchase);
        }
        $purchase->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.purchases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        Gate::authorize('app.purchases.destroy');
        if (Storage::exists('public/purchase_files/'.$purchase->file)) {
            Storage::delete('public/purchase_files/'.$purchase->file);
            $purchase->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
