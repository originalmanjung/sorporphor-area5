<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
Use Alert;

class MissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Mission::class, 'mission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.missions.index');
        $missions = Mission::all()->sortBy('created_at');
        return view('admin.mission.index',[
            'missions' => $missions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.missions.create');
        return view('admin.mission.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.missions.create');
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        Mission::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.missions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        Gate::authorize('app.missions.edit');
        return view('admin.mission.show',[
            'mission' => $mission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
        return view('admin.mission.form',[
            'mission' => $mission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        Gate::authorize('app.missions.edit');
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $mission->update($request->all());
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.missions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
        Gate::authorize('app.missions.destroy');
        $mission->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return back();
    }
}
