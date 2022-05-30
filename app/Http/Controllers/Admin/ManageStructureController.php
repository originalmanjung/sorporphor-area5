<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class ManageStructureController extends Controller
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
        $manageStructures = ManageStructure::orderBy('created_at', 'desc')->get();
        return view('admin.manageStructure.index',[
            'manageStructures' => $manageStructures
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.manageStructures.create');
        return view('admin.manageStructure.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.manageStructures.create');
        $request->validate([
            'name' => 'required|max:255',
            'file' => 'required|required|image|mimes:png,jpg,jpeg|max:5120',
        ]);
        if ($request->hasFile('file')) {
            $photo = $request->file('file');
            $filename  = 'photo-' . uniqid() . '.' .$photo->getClientOriginalExtension();
            $photo->storeAs('manageStructure_photos', $filename, 'public');
        }
        ManageStructure::create([
            'name' => $request->name,
            'file' => $filename,
            'user_id' => auth()->user()->id,
        ]);
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.manageStructures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManageStructure  $manageStructure
     * @return \Illuminate\Http\Response
     */
    public function show(ManageStructure $manageStructure)
    {
        return view('admin.manageStructure.show',[
            'manageStructure' => $manageStructure
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManageStructure  $manageStructure
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageStructure $manageStructure)
    {
        Gate::authorize('app.manageStructures.edit');
        return view('admin.manageStructure.form',[
            'manageStructure' => $manageStructure
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManageStructure  $manageStructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManageStructure $manageStructure)
    {
        Gate::authorize('app.manageStructures.edit');
        $request->validate([
            'name' => 'required|max:255',
            'file' => 'nullable|image|mimes:png,jpg,jpeg|max:5120',
        ]);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($manageStructure->file != null){
                storage::disk('public')->delete('manageStructure_photos/'.$manageStructure->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('manageStructure_photos', $filename, 'public');
        }
        $manageStructure->update([
            'name' => $request->name,
            'file' => !isset($file) ? $manageStructure->file : $filename,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.manageStructures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManageStructure  $manageStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageStructure $manageStructure)
    {
        Gate::authorize('app.manageStructures.destroy');
        if (Storage::exists('public/manageStructure_photos/'.$manageStructure->file)) {
            Storage::delete('public/manageStructure_photos/'.$manageStructure->file);
            $manageStructure->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
