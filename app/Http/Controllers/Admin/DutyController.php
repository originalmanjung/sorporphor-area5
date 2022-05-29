<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Duty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
Use Alert;

class DutyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dutys = Duty::all()->sortBy('created_at');
        return view('admin.duty.index',[
            'dutys' => $dutys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.dutys.create');
        return view('admin.duty.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.dutys.create');
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        Duty::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.dutys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function show(Duty $duty)
    {
        return view('admin.duty.show',[
            'duty' => $duty
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function edit(Duty $duty)
    {
        Gate::authorize('app.dutys.edit');
        return view('admin.duty.form',[
            'duty' => $duty
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Duty $duty)
    {
        Gate::authorize('app.dutys.edit');
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $duty->update($request->all());
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.dutys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duty $duty)
    {
        Gate::authorize('app.dutys.destroy');
        $duty->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return back();
    }
}
