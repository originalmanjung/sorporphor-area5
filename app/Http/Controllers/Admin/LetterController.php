<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Letter\StoreLetterRequest;
use App\Http\Requests\Letter\UpdateLetterRequest;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class LetterController extends Controller
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
        $letters = Letter::all();
        return view('admin.letter.index',[
            'letters' => $letters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.letters.create');
        return view('admin.letter.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLetterRequest $request)
    {
        Gate::authorize('app.letters.create');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('letter_files', $filename, 'public');
        }
        Letter::create([
            'name' => $request->name,
            'file' => $filename,
            'user_id' => auth()->user()->id,
            'type' => $request->type,
        ]);
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.letters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function show(Letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {
        Gate::authorize('app.letters.edit');
        return view('admin.letter.form',[
            'letter' => $letter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLetterRequest $request, Letter $letter)
    {
        Gate::authorize('app.letters.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($letter->file != null){
                storage::disk('public')->delete('letter_files/'.$letter->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('letter_files', $filename, 'public');
        }
        $letter->update([
            'name' => $request->name,
            'file' => !isset($file) ? $letter->file : $filename,
            'type' => $request->type,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.letters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter $letter)
    {
        Gate::authorize('app.letters.destroy');
        if (Storage::exists('public/letter_files/'.$letter->file)) {
            Storage::delete('public/letter_files/'.$letter->file);
            $letter->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
