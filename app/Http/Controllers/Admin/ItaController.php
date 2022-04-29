<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ita;
use Illuminate\Http\Request;
use App\Http\Requests\Ita\StoreItaRequest;
use App\Http\Requests\Ita\UpdateItaRequest;
use Illuminate\Support\Facades\Storage;
Use Alert;
use Illuminate\Support\Facades\Gate;

class ItaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Ita::class, 'ita');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gate::authorize('app.ITA.index');
        // $itas = Ita::tree()->get()->toTree();
        $itas = Ita::where('parent_id',NULL)->get();
        return view('admin.ita.index',[
            'itas' => $itas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.ITA.create');
        $ita_categories = Ita::all();
        return view('admin.ita.form',[
           'ita_categories' => $ita_categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItaRequest $request)
    {
        Gate::authorize('app.ITA.create');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('ita_files', $filename, 'public');
        }
        Ita::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->parent_id,
            'url' => $request->url,
            'file' => $filename ?? null,
            'status' => $request->filled('status')
        ]);
        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return redirect()->route('app.ita.index')->withSuccess('Success message');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ita = Ita::findOrFail($id);
        return view('admin.ita.viewPDF',[
            'ita' => $ita,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Http\Response
     */
    public function edit(Ita $ita)
    {
        return $ita;
        // $ita = Ita::findOrFail($id);
        $ita_categories = Ita::all();
        return view('admin.ita.form',[
            'ita' => $ita,
            'ita_categories' => $ita_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItaRequest $request, $id)
    {
        Gate::authorize('app.ITA.edit');
        $ita = Ita::findOrFail($id);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($ita->file != null){
                storage::disk('public')->delete('ita_files/'.$ita->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('ita_files', $filename, 'public');
        }
        $ita->update([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->parent_id,
            'url' => $request->url,
            'file' => !isset($file) ? $ita->file : $filename,
            'status' => $request->filled('status'),
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.ita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Http\Response
     */
    public function deleteChild($id)
    {
        $ita = Ita::find($id);
        if (Storage::exists('public/ita_files/'.$ita->file)) {
            Storage::delete('public/ita_files/'.$ita->file);
            $ita->delete();
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Http\Response
     */
    public function deleteSubChild($id)
    {
        $ita = Ita::find($id);
        if (Storage::exists('public/ita_files/'.$ita->file)) {
            Storage::delete('public/ita_files/'.$ita->file);
            $ita->delete();
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }

    public function deleteFile($id)
    {
        $ita = Ita::findOrFail($id);
        if (Storage::exists('public/ita_files/'.$ita->file)) {
            Storage::delete('public/ita_files/'.$ita->file);
            $ita->update([
                'file' => null,
            ]);
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ita $ita)
    {
        Gate::authorize('app.ITA.destroy');
        if (Storage::exists('public/ita_files/'.$ita->file)) {
            Storage::delete('public/ita_files/'.$ita->file);
            $ita->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
