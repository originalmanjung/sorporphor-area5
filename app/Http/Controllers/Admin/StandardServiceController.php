<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandardService\StoreStandardServiceRequest;
use App\Http\Requests\StandardService\UpdateStandardServiceRequest;
use App\Models\StandardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
Use Alert;

class StandardServiceController extends Controller
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
        Gate::authorize('app.standardServices.index');
        $standardServices = StandardService::where('parent_id',NULL)->get();
        return view('admin.standard-service.index',[
            'standardServices' => $standardServices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.standardServices.create');
        return view('admin.standard-service.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createChild(StandardService $standardService)
    {
        // return $standardService->parent;
        Gate::authorize('app.standardServices.create');
        return view('admin.standard-service.form',[
            'standardServiceParent' => $standardService
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStandardServiceRequest $request)
    {
        Gate::authorize('app.standardServices.create');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('StandardService_files', $filename, 'public');
        }
        $standardServiceID = StandardService::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->parent_id,
            'file' => $filename ?? null,
        ]);

        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.standardServices.show',$request->parent_id ?? $standardServiceID->id);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StandardService  $standardService
     * @return \Illuminate\Http\Response
     */
    public function show(StandardService $standardService)
    {
        if (!empty($standardService->parent_id)) {
            $standardServices = StandardService::where('parent_id',$standardService->parent_id)->get();
        } else {
            $standardServices = StandardService::where('parent_id',NULL)->get();
        }
        return view('admin.standard-service.show',[
            'standardService' => $standardService,
            'standardServices' => $standardServices,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StandardService  $standardService
     * @return \Illuminate\Http\Response
     */
    public function edit(StandardService $standardService)
    {
        // return $standardService;
        Gate::authorize('app.standardServices.edit');
        return view('admin.standard-service.form',[
            'standardService' => $standardService,
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StandardService  $standardService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStandardServiceRequest $request, StandardService $standardService)
    {
        Gate::authorize('app.standardServices.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            if($standardService->file != null){
                storage::disk('public')->delete('StandardService_files/'.$standardService->file);
            }
            $filename  = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
            $file->storeAs('standardService_files', $filename, 'public');
        }
        $standardService->update([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'parent_id' => $standardService->parent_id,
            'file' => !isset($file) ? $standardService->file : $filename,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        if (is_null($standardService->parent_id)) {
            return  redirect()->route('app.standardServices.index');
        } else {
            return  redirect()->route('app.standardServices.show',$standardService->parent->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StandardService  $standardService
     * @return \Illuminate\Http\Response
     */
    public function destroy(StandardService $standardService)
    {
        Gate::authorize('app.standardServices.destroy');
        if (Storage::exists('public/StandardService_files/'.$standardService->file)) {
            Storage::delete('public/StandardService_files/'.$standardService->file);
        }
        $standardService->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return back();
    }
}
