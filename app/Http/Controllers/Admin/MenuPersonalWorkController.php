<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuPersonalWork;
use Illuminate\Http\Request;
use App\Http\Requests\MenuPersonalWork\StoreMenuPersonalWorkRequest;
use App\Http\Requests\MenuPersonalWork\UpdateMenuPersonalWorkRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class MenuPersonalWorkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(MenuPersonalWork::class, 'menuPersonalWork');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuPersonalWorks = MenuPersonalWork::orderBy('created_at', 'desc')->get();
        return view('admin.menuPersonalWork.index',[
            'menuPersonalWorks' => $menuPersonalWorks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menuPersonalWork.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuPersonalWorkRequest $request)
    {
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('menuPersonalWork_files', $filename, 'public');
        }
        MenuPersonalWork::create([
            'name' => $request->name,
            'file' => $filename,
            'user_id' => auth()->user()->id,
            'role_id' => auth()->user()->role->id
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.menuPersonalWorks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuPersonalWork  $menuPersonalWork
     * @return \Illuminate\Http\Response
     */
    public function show(MenuPersonalWork $menuPersonalWork)
    {
        return view('admin.menuPersonalWork.show',[
            'menuPersonalWork' => $menuPersonalWork
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuPersonalWork  $menuPersonalWork
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuPersonalWork $menuPersonalWork)
    {
        return view('admin.menuPersonalWork.form',[
            'menuPersonalWork' => $menuPersonalWork
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuPersonalWork  $menuPersonalWork
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuPersonalWorkRequest $request, MenuPersonalWork $menuPersonalWork)
    {
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($menuPersonalWork->file != null){
                storage::disk('public')->delete('menuPersonalWork_files/'.$menuPersonalWork->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('menuPersonalWork_files', $filename, 'public');
        }
        $menuPersonalWork->update([
            'name' => $request->name,
            'file' => !isset($file) ? $menuPersonalWork->file : $filename,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.menuPersonalWorks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuPersonalWork  $menuPersonalWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuPersonalWork $menuPersonalWork)
    {
        if (Storage::exists('public/menuPersonalWork_files/'.$menuPersonalWork->file)) {
            Storage::delete('public/menuPersonalWork_files/'.$menuPersonalWork->file);
            $menuPersonalWork->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
