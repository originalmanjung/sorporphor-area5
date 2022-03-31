<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegislationList;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\LegislationList\StoreLegislationListRequest;
use App\Http\Requests\LegislationList\UpdateLegislationListRequest;
use Illuminate\Support\Facades\Gate;
Use Alert;

class LegislationListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(LegislationList::class, 'legislationList');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.legislationLists.index');
        if (auth()->user()->role_id == 1) {
            $legislationLists = LegislationList::all()->sortDesc();
        } else {
            $legislationLists = LegislationList::where('role_id', auth()->user()->role_id)->get()->sortDesc();
        }
        return view('admin.legislationList.index',[
            'legislationLists' => $legislationLists
        ])->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.legislationLists.create');
        $roles = Role::whereNotIn('name', ['แอดมิน', 'ผู้ใช้ทั่วไป'])->get();
        return view('admin.legislationList.form',[
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLegislationListRequest $request)
    {
        Gate::authorize('app.legislationLists.create');
        LegislationList::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'user_id' => auth()->user()->id,
            'status' => $request->filled('status')
        ]);
        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return redirect()->route('app.legislationLists.index')->withSuccess('Success message');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LegislationList  $legislationList
     * @return \Illuminate\Http\Response
     */
    public function show(LegislationList $legislationList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LegislationList  $legislationList
     * @return \Illuminate\Http\Response
     */
    public function edit(LegislationList $legislationList)
    {
        Gate::authorize('app.legislationLists.edit');
        $roles = Role::whereNotIn('name', ['แอดมิน', 'ผู้ใช้ทั่วไป'])->get();
        return view('admin.legislationList.form',[
            'roles' => $roles,
            'legislationList' => $legislationList
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LegislationList  $legislationList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLegislationListRequest $request, LegislationList $legislationList)
    {
        Gate::authorize('app.legislationLists.edit');
        $legislationList->update([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'user_id' => auth()->user()->id,
            'status' => $request->filled('status')
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return redirect()->route('app.legislationLists.index')->withSuccess('Success message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LegislationList  $legislationList
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegislationList $legislationList)
    {
        Gate::authorize('app.legislationLists.destroy');
    }
}
