<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Corruption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class CorruptionController extends Controller
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
        Gate::authorize('app.corruptions.index');
        $corruptions = Corruption::orderBy('created_at', 'desc')->get();
        return view('admin.corruption.index',[
            'corruptions' => $corruptions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.corruptions.create');
        return view('admin.corruption.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.corruptions.create');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('law_files', $filename, 'public');
        }
        $lawID = Law::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->parent_id,
            'file' => $filename ?? null,
        ]);

        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.laws.show',$request->parent_id ?? $lawID->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corruption  $corruption
     * @return \Illuminate\Http\Response
     */
    public function show(Corruption $corruption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corruption  $corruption
     * @return \Illuminate\Http\Response
     */
    public function edit(Corruption $corruption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corruption  $corruption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corruption $corruption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corruption  $corruption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corruption $corruption)
    {
        //
    }
}
