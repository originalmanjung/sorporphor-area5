<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HumanResource;
use Illuminate\Http\Request;
use App\Http\Requests\HumanResource\StoreHumanResourceRequest;
use App\Http\Requests\HumanResource\UpdateHumanResourceRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
Use Alert;

class HumanResourceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(HumanResource::class, 'humanResource');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $humanResources = HumanResource::where('parent_id',NULL)->get();
        return view('admin.humanResource.index',[
            'humanResources' => $humanResources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.humanResources.create');
        return view('admin.humanResource.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createChild(HumanResource $humanResource)
    {
        Gate::authorize('app.humanResources.create');
        return view('admin.humanResource.form',[
            'humanResourceParent' => $humanResource
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHumanResourceRequest $request)
    {
        Gate::authorize('app.humanResources.create');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('humanResource_files', $filename, 'public');
        }
        $humanResourceID = HumanResource::create([
            'name' => $request->name,
            'subname' => $request->subname,
            'number' => $request->number,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->has('parent_id') ? $request->parent_id : null,
            'file' => $filename ?? null,
        ]);

        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.humanResources.show',$request->parent_id ?? $humanResourceID->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HumanResource  $humanResource
     * @return \Illuminate\Http\Response
     */
    public function show(HumanResource $humanResource)
    {
        $humanResources = HumanResource::where('parent_id',NULL)->get();
        return view('admin.humanResource.show',[
            'humanResource' => $humanResource,
            'humanResources' => $humanResources,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HumanResource  $humanResource
     * @return \Illuminate\Http\Response
     */
    public function viewPDF(HumanResource $humanResource)
    {
        return view('admin.humanResource.viewPDF',[
            'humanResource' => $humanResource,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HumanResource  $humanResource
     * @return \Illuminate\Http\Response
     */
    public function edit(HumanResource $humanResource)
    {
        Gate::authorize('app.humanResources.edit');
        return view('admin.humanResource.form',[
            'humanResource' => $humanResource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HumanResource  $humanResource
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHumanResourceRequest $request, HumanResource $humanResource)
    {
        Gate::authorize('app.laws.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($humanResource->file != null){
                storage::disk('public')->delete('humanResource_files/'.$humanResource->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('humanResource_files', $filename, 'public');
        }
        $humanResource->update([
            'name' => $request->name,
            'subname' => $request->subname,
            'number' => $request->number,
            'parent_id' => $humanResource->parent_id,
            'file' => !isset($file) ? $humanResource->file : $filename,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        if (is_null($humanResource->parent_id)) {
            return  redirect()->route('app.humanResources.index');
        } else {
            return  redirect()->route('app.humanResources.show',$humanResource->parent->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HumanResource  $humanResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(HumanResource $humanResource)
    {
        Gate::authorize('app.humanResources.destroy');
        if (Storage::exists('public/humanResource_files/'.$humanResource->file)) {
            Storage::delete('public/humanResource_files/'.$humanResource->file);
        }
        $humanResource->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return back();
    }
}
