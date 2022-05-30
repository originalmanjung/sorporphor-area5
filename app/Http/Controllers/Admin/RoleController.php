<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
Use Alert;

class RoleController extends Controller
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
        Gate::authorize('app.roles.index');
        $roles = Role::whereNotIn('name', ['admin'])->get()->sortDesc();
        return view('admin.role.index',[
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.roles.create');
        // $modules = Module::all();
        $modules = Module::whereNotIn('id', ['1','2'])->get();
        return view('admin.role.form',[
            'modules' => $modules
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create([
            'name' => $request->name,
        ])->permissions()->sync($request->input('permissions', []));
        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return redirect()->route('app.roles.index')->withSuccess('Success message');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('app.roles.edit');
        $modules = Module::whereNotIn('id', ['1','2','3','4','5','6','7','8'])->get();
        return view('admin.role.form',[
            'role' => $role,
            'modules' => $modules
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        // return $request->all();
        $role->update([
            'name' => $request->name,
        ]);
        $role->permissions()->sync($request->input('permissions', []));
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return redirect()->route('app.roles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('app.roles.destroy');
        if ($role->deletable) {
            $role->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
        } else {
            Alert::toast('ลบข้อมูลไม่สำเร็จ!','error');
        }
        return back();
    }
}
