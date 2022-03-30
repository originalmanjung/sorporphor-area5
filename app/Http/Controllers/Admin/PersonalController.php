<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Personal\StorePersonalRequest;
use App\Http\Requests\Personal\UpdatePersonalRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;


class PersonalController extends Controller
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
        Gate::authorize('app.personals.index');
        $personals = Personal::all();
        return view('admin.personal.index',[
            'personals' => $personals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.personals.create');
        $roles = Role::whereNotIn('name', ['แอดมิน', 'ผู้ใช้ทั่วไป', 'โรงเรียน'])->get();
        return view('admin.personal.form',[
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonalRequest $request)
    {
        Gate::authorize('app.personals.create');
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['status'] = $request->filled('status');
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('personal_avatars', $filename, 'public');
            $data['avatar'] = $filename;
        }
        Personal::create($data);
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.personals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        return view('admin.personal.show',[
           'personal' => $personal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        Gate::authorize('app.personals.edit');
        $roles = Role::whereNotIn('name', ['แอดมิน', 'ผู้ใช้ทั่วไป', 'โรงเรียน'])->get();
        return view('admin.personal.form',[
            'personal' => $personal,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonalRequest $request, Personal $personal)
    {
        Gate::authorize('app.personals.edit');
        $data = $request->all();
        $data['status'] = $request->filled('status');
        if ($request->hasfile('avatar')) {
            if($personal->avatar != null){
                storage::disk('public')->delete('personal_avatars/'.$personal->avatar);
            }
            $file = $request->file('avatar');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('personal_avatars', $filename, 'public');
            $data['avatar'] = $filename;
        }
        $personal->update($data);
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.personals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        Gate::authorize('app.personals.destroy');
        if($personal->avatar != null){
            storage::disk('public')->delete('personal_avatars/'.$personal->avatar);
        }
        $personal->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return redirect()->route('app.personals.index');
    }
}
