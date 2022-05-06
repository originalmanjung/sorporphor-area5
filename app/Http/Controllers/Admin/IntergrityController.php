<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Intergrity\StoreIntergrityRequest;
use App\Http\Requests\Intergrity\UpdateIntergrityRequest;
use App\Models\Intergrity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
Use Alert;


class IntergrityController extends Controller
{
    public $category;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Intergrity::class, 'intergrity');
        $this->category = new Intergrity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.intergrities.index');
        $intergrities = Intergrity::all();
        return view('admin.intergrity.index',[
            'intergrities' => $intergrities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.intergrities.create');
        $intergrities = Intergrity::where('parent_id',NULL)->get();
        return view('admin.intergrity.form',[
           'intergrities' => $intergrities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIntergrityRequest $request)
    {
        // return $request->all();
        Gate::authorize('app.intergrities.create');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('intergrity_files', $filename, 'public');
        }
        Intergrity::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->parent_id,
            'url' => $request->url,
            'file' => $filename ?? null,
            'status' => $request->filled('status')
        ]);
        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return redirect()->route('app.intergrities.index')->withSuccess('Success message');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Http\Response
     */
    public function show(Intergrity $intergrity)
    {
        $intergrities = Intergrity::where('parent_id',NULL)->get();
        return view('admin.intergrity.show',[
            'intergrity' => $intergrity,
            'intergrities' => $intergrities,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Http\Response
     */
    public function edit(Intergrity $intergrity)
    {
        Gate::authorize('app.intergrities.edit');
        return view('admin.intergrity.form',[
            'intergrity' => $intergrity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIntergrityRequest $request, Intergrity $intergrity)
    {
        Gate::authorize('app.intergrities.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($intergrity->file != null){
                storage::disk('public')->delete('intergrity_files/'.$intergrity->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('intergrity_files', $filename, 'public');
        }
        $intergrity->update([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $intergrity->parent_id,
            'url' => $request->url,
            'file' => !isset($file) ? $intergrity->file : $filename,
            'status' => $request->filled('status')
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.intergrities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intergrity $intergrity)
    {
        Gate::authorize('app.intergrities.destroy');
        if (Storage::exists('public/intergrity_files/'.$intergrity->file)) {
            Storage::delete('public/intergrity_files/'.$intergrity->file);
        }
        $intergrity->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return back();
    }

    public function deleteFile(Intergrity $intergrity)
    {
        if (Storage::exists('public/intergrity_files/'.$intergrity->file)) {
            Storage::delete('public/intergrity_files/'.$intergrity->file);
            $intergrity->update([
                'file' => null,
            ]);
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Http\Response
     */
    public function showPDF(Intergrity $intergrity)
    {
        return view('admin.intergrity.viewPDF',[
            'intergrity' => $intergrity,
        ]);
    }
}
