<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Law\StoreLawRequest;
use App\Http\Requests\Law\UpdateLawRequest;
use App\Models\Law;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
Use Alert;

class LawController extends Controller
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

    public function index()
    {
        Gate::authorize('app.laws.index');
        $laws = Law::where('parent_id',NULL)->get();
        return view('admin.law.index',[
            'laws' => $laws
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.laws.create');
        return view('admin.law.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createChild(Law $law)
    {
        Gate::authorize('app.laws.create');
        return view('admin.law.form',[
            'lawParent' => $law
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLawRequest $request)
    {
        Gate::authorize('app.laws.create');
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
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Http\Response
     */
    public function show(Law $law)
    {
        $laws = Law::where('parent_id',NULL)->get();
        return view('admin.law.show',[
            'law' => $law,
            'laws' => $laws,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Http\Response
     */
    public function edit(Law $law)
    {
        Gate::authorize('app.laws.edit');
        return view('admin.law.form',[
            'law' => $law,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLawRequest $request, Law $law)
    {
        Gate::authorize('app.laws.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($law->file != null){
                storage::disk('public')->delete('law_files/'.$law->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('law_files', $filename, 'public');
        }
        $law->update([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $law->parent_id,
            'file' => !isset($file) ? $law->file : $filename,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        if (is_null($law->parent_id)) {
            return  redirect()->route('app.laws.index');
        } else {
            return  redirect()->route('app.laws.show',$law->parent->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Http\Response
     */
    public function destroy(Law $law)
    {
        Gate::authorize('app.laws.destroy');
        if (Storage::exists('public/law_files/'.$law->file)) {
            Storage::delete('public/law_files/'.$law->file);
        }
        $law->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return back();
    }
}
