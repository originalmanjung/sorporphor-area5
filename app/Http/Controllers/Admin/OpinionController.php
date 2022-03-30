<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Notifications\Approved;
Use Alert;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.opinions.index');
        $opinions = Opinion::all()->sortByDesc('created_at');
        return view('admin.opinion.index',[
            'opinions' => $opinions
        ]);
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
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function show(Opinion $opinion)
    {
        Gate::authorize('app.opinions.index');
        return view('admin.opinion.show',[
            'opinion' => $opinion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opinion $opinion)
    {
        Gate::authorize('app.opinions.edit');
        $opinion->update([
            'user_id' => auth()->user()->id,
            'approved' => 1,
            'approved_at' => now(),
        ]);
        $approvedData = [
            'sub' => 'แจ้งเตือนยืนยันการรับเรื่องรับฟังความคิดเห็น',
            'head' => 'สวัสดี!',
            'body' => 'เราได้รับเรื่องแสดงความคิดเห็น ของท่านแล้ว',
            'thankyou' => 'ขอขอบคุณ'
        ];
        $opinion->notify(new Approved($approvedData));
        Alert::toast('รับเรื่องเรียบร้อยแล้ว!','success');
        return  redirect()->route('app.opinions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinion $opinion)
    {
        //
    }
}
