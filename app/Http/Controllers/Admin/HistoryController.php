<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
Use Alert;

class HistoryController extends Controller
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
        $histories = History::all()->sortBy('created_at');
        return view('admin.history.index',[
            'histories' => $histories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.histories.create');
        return view('admin.history.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.histories.create');
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        History::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.histories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        return view('admin.history.show',[
            'history' => $history
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        Gate::authorize('app.histories.edit');
        return view('admin.history.form',[
            'history' => $history
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        Gate::authorize('app.histories.edit');
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $history->update($request->all());
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.histories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        Gate::authorize('app.histories.destroy');
        $history->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return back();
    }
}
