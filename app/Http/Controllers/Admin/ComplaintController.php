<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Notifications\Approved;
Use Alert;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all()->sortByDesc('created_at');
        return view('admin.complaint.index',[
            'complaints' => $complaints
        ]);
    }

    public function approved()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return view('admin.complaint.show',[
            'complaint' => $complaint
        ]);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function viewPDF(Complaint $complaint)
    {
        Gate::authorize('app.complaints.index');
        return view('admin.complaint.viewPDF',[
            'complaint' => $complaint
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        Gate::authorize('app.complaints.edit');
        $complaint->update([
            'user_id' => auth()->user()->id,
            'approved' => 1,
            'approved_at' => now(),
        ]);
        $approvedData = [
            'sub' => 'แจ้งเตือนยืนยันการรับเรื่องร้องทุกข์',
            'head' => 'สวัสดี!',
            'body' => 'เราได้รับเรื่องร้องทุกข์-ร้องเรียน ของท่านแล้ว',
            'thankyou' => 'ขอบขอบคุณ'
        ];
        $complaint->notify(new Approved($approvedData));
        Alert::toast('รับเรื่องเรียบร้อยแล้ว!','success');
        return  redirect()->route('app.complaints.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
