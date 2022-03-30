<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use Illuminate\Http\Request;
use App\Http\Requests\budget\StorebudgetRequest;
use App\Http\Requests\budget\UpdatebudgetRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;


class BudgetController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Budget::class, 'budget');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.budgets.index');
        $budgets = Budget::orderBy('created_at', 'desc')->get();
        return view('admin.budget.index',[
            'budgets' => $budgets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.budgets.create');
        return view('admin.budget.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebudgetRequest $request)
    {
        Gate::authorize('app.budgets.create');
        $budget = new budget;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            budget::UploadFile($file, $budget);
        }
        $budget->name = $request->name;
        $budget->description = $request->description;
        $budget->save();
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.budgets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        return view('admin.budget.show',[
            'budget' => $budget
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        Gate::authorize('app.budgets.edit');
        return view('admin.budget.form',[
            'budget' => $budget
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebudgetRequest $request, Budget $budget)
    {
        Gate::authorize('app.budgets.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            Budget::UploadFile($file, $budget);
        }
        $budget->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.budgets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget)
    {
        Gate::authorize('app.budgets.destroy');
        if (Storage::exists('public/budget_files/'.$budget->file)) {
            Storage::delete('public/budget_files/'.$budget->file);
            $budget->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
