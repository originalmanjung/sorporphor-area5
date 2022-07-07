<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popupimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class PopupimageController extends Controller
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
        $popupimages = Popupimage::orderBy('created_at', 'desc')->get();
        return view('admin.popupimage.index',[
            'popupimages' => $popupimages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.popupimages.create');
        return view('admin.popupimage.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.popupimages.create');
        $request->validate([
            'name' => 'required|max:255',
            'file' => 'required|required|image|mimes:png,jpg,jpeg|max:5120',
        ]);
        if ($request->hasFile('file')) {
            $photo = $request->file('file');
            $filename  = 'photo-' . uniqid() . '.' .$photo->getClientOriginalExtension();
            $photo->storeAs('popupimage_photos', $filename, 'public');
        }
        Popupimage::create([
            'name' => $request->name,
            'file' => $filename,
            'user_id' => auth()->user()->id,
        ]);
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.popupimages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Popupimage  $popupimage
     * @return \Illuminate\Http\Response
     */
    public function show(Popupimage $popupimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Popupimage  $popupimage
     * @return \Illuminate\Http\Response
     */
    public function edit(Popupimage $popupimage)
    {
        Gate::authorize('app.popupimages.edit');
        return view('admin.popupimage.form',[
            'popupimage' => $popupimage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Popupimage  $popupimage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Popupimage $popupimage)
    {
        Gate::authorize('app.popupimages.edit');
        $request->validate([
            'name' => 'required|max:255',
            'file' => 'nullable|image|mimes:png,jpg,jpeg|max:5120',
        ]);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($popupimage->file != null){
                storage::disk('public')->delete('popupimage_photos/'.$popupimage->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('popupimage_photos', $filename, 'public');
        }
        $popupimage->update([
            'name' => $request->name,
            'file' => !isset($file) ? $popupimage->file : $filename,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.popupimages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Popupimage  $popupimage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Popupimage $popupimage)
    {
        Gate::authorize('app.popupimages.destroy');
        if (Storage::exists('public/popupimage_photos/'.$popupimage->file)) {
            Storage::delete('public/popupimage_photos/'.$popupimage->file);
            $popupimage->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
