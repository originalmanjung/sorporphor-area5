<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Corruption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;
use App\Http\Requests\Corruption\StoreCorruptionRequest;
use App\Http\Requests\Corruption\UpdateCorruptionRequest;

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
        $this->authorizeResource(Corruption::class, 'corruption');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(StoreCorruptionRequest $request)
    {
        Gate::authorize('app.corruptions.create');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('corruption_files', $filename, 'public');
        }
        Corruption::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'description' => $request->description,
            'file' => $filename ?? null,
        ]);

        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.corruptions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corruption  $corruption
     * @return \Illuminate\Http\Response
     */
    public function show(Corruption $corruption)
    {
        return view('admin.corruption.show',[
            'corruption' => $corruption
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corruption  $corruption
     * @return \Illuminate\Http\Response
     */
    public function edit(Corruption $corruption)
    {
        Gate::authorize('app.corruptions.edit');
        return view('admin.corruption.form',[
            'corruption' => $corruption
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corruption  $corruption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCorruptionRequest $request, Corruption $corruption)
    {
        Gate::authorize('app.corruptions.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($corruption->file != null){
                storage::disk('public')->delete('corruption_files/'.$corruption->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('corruption_files', $filename, 'public');
        }
        $corruption->update([
            'name' => $request->name,
            'user_id' => $corruption->user_id,
            'description' => $corruption->description,
            'file' => !isset($file) ? $corruption->file : $filename,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.corruptions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corruption  $corruption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corruption $corruption)
    {
        Gate::authorize('app.corruptions.destroy');
        if (Storage::exists('public/corruption_files/'.$corruption->file)) {
            Storage::delete('public/corruption_files/'.$corruption->file);
            $corruption->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
