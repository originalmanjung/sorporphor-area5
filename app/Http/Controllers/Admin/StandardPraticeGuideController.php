<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StandardPraticeGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
Use Alert;
use App\Http\Requests\StandardPraticeGuide\StoreStandardPraticeGuideRequest;
use App\Http\Requests\StandardPraticeGuide\UpdateStandardPraticeGuideRequest;

class StandardPraticeGuideController extends Controller
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
        Gate::authorize('app.standardPraticeGuides.index');
        $standardPraticeGuides = StandardPraticeGuide::where('parent_id',NULL)->get();
        return view('admin.standard-pratice-guide.index',[
            'standardPraticeGuides' => $standardPraticeGuides
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.standardPraticeGuides.create');
        return view('admin.standard-pratice-guide.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createChild(StandardPraticeGuide $standardPraticeGuide)
    {
        Gate::authorize('app.standardPraticeGuides.create');
        return view('admin.standard-pratice-guide.form',[
            'standardPraticeGuideParent' => $standardPraticeGuide
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewPDF(StandardPraticeGuide $standardPraticeGuide)
    {
        return view('admin.standard-pratice-guide.viewPDF',[
            'standardPraticeGuide' => $standardPraticeGuide
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStandardPraticeGuideRequest $request)
    {
        Gate::authorize('app.standardPraticeGuides.create');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('StandardPraticeGuide_files', $filename, 'public');
        }
        $standardPraticeGuideID = StandardPraticeGuide::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->parent_id,
            'file' => $filename ?? null,
        ]);

        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.standardPraticeGuides.show',$request->parent_id ?? $standardPraticeGuideID->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StandardPraticeGuide  $standardPraticeGuide
     * @return \Illuminate\Http\Response
     */
    public function show(StandardPraticeGuide $standardPraticeGuide)
    {
        $standardPraticeGuides = StandardPraticeGuide::where('parent_id',NULL)->get();
        return view('admin.standard-pratice-guide.show',[
            'standardPraticeGuide' => $standardPraticeGuide,
            'standardPraticeGuides' => $standardPraticeGuides,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StandardPraticeGuide  $standardPraticeGuide
     * @return \Illuminate\Http\Response
     */
    public function edit(StandardPraticeGuide $standardPraticeGuide)
    {
        Gate::authorize('app.standardPraticeGuides.edit');
        return view('admin.standard-pratice-guide.form',[
            'standardPraticeGuide' => $standardPraticeGuide,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StandardPraticeGuide  $standardPraticeGuide
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStandardPraticeGuideRequest $request, StandardPraticeGuide $standardPraticeGuide)
    {
        Gate::authorize('app.standardPraticeGuides.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($standardPraticeGuide->file != null){
                storage::disk('public')->delete('StandardPraticeGuide_files/'.$standardPraticeGuide->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('StandardPraticeGuide_files', $filename, 'public');
        }
        $standardPraticeGuide->update([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $standardPraticeGuide->parent_id,
            'file' => !isset($file) ? $standardPraticeGuide->file : $filename,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        if (is_null($standardPraticeGuide->parent_id)) {
            return  redirect()->route('app.standardPraticeGuides.index');
        } else {
            return  redirect()->route('app.standardPraticeGuides.show',$standardPraticeGuide->parent->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StandardPraticeGuide  $standardPraticeGuide
     * @return \Illuminate\Http\Response
     */
    public function destroy(StandardPraticeGuide $standardPraticeGuide)
    {
        Gate::authorize('app.standardPraticeGuides.destroy');
        if (Storage::exists('public/StandardPraticeGuide_files/'.$standardPraticeGuide->file)) {
            Storage::delete('public/StandardPraticeGuide_files/'.$standardPraticeGuide->file);
        }
        $standardPraticeGuide->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return back();
    }
}
