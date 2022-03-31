<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Legislation;
use App\Models\LegislationList;
use App\Models\LegislationFile;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Legislation\StoreLegislationRequest;
use App\Http\Requests\Legislation\UpdateLegislationRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class LegislationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Legislation::class, 'legislation');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.legislations.index');
        if (auth()->user()->role_id == 1) {
            $legislations = Legislation::with('legislationFiles')->get()->sortDesc();
        } else {
            $legislations = Legislation::where('legislation_role', auth()->user()->role_id)->orderBy('created_at', 'desc')->get()->sortDesc();
        }
        return view('admin.legislation.index',[
            'legislations' => $legislations
        ])->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.legislations.create');
        if (auth()->user()->role_id == 1) {
            $legislationList = LegislationList::active()->get();
        } else {
            $legislationList = LegislationList::where('role_id', auth()->user()->role_id)->active()->get();
        }
        return view('admin.legislation.form',[
            'legislationList' => $legislationList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLegislationRequest $request)
    {
        Gate::authorize('app.legislations.create');
        $legislationRoleId = LegislationList::where('id',$request->legislation_list_id)->first()->role_id;
        $legislation = Legislation::create([
            'legislation_list_id' => $request->legislation_list_id,
            'user_id' => $request->user()->id,
            'legislation_role' => $legislationRoleId
        ]);
        if ($request->hasfile('files')) {
            $names = $request->input('names');
            $files = $request->file('files');
            Legislation::UploadFile($files, $names, $legislation);
        }
        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return redirect()->route('app.legislations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Legislation  $legislation
     * @return \Illuminate\Http\Response
     */
    public function show(Legislation $legislation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Legislation  $legislation
     * @return \Illuminate\Http\Response
     */
    public function edit(Legislation $legislation)
    {
        // Gate::authorize('app.legislations.edit');
        // if (auth()->user()->role_id == 1) {
        //     $legislationList = LegislationList::all();
        // } else {
        //     $legislationList = LegislationList::where('role_id', auth()->user()->role_id)->get();
        // }
        // return view('admin.legislation.form',[
        //     'legislation' => $legislation,
        //     'legislationList' => $legislationList
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Legislation  $legislation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLegislationRequest $request, Legislation $legislation)
    {
        // Gate::authorize('app.legislations.edit');
        // $legislationRoleId = LegislationList::where('id',$request->legislation_list_id)->first()->role_id;
        // $legislation->update([
        //     'legislation_list_id' => $request->legislation_list_id,
        //     'legislation_role' => $legislationRoleId
        // ]);
        // if ($request->hasfile('files')) {
        //     $names = $request->input('names');
        //     $files = $request->file('files');
        //     Legislation::UploadFile($files, $names, $legislation);
        // }
        // Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        // return redirect()->route('app.legislations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Legislation  $legislation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Legislation $legislation)
    {
        Gate::authorize('app.legislations.destroy');
        $legislation->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return redirect()->route('app.legislations.index');
    }
}
