<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegislationFile;
use App\Models\Legislation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class LegislationFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LegislationFile  $legislationFile
     * @return \Illuminate\Http\Response
     */
    public function show(LegislationFile $legislationFile)
    {
        return view('admin.legislation.viewPDF',[
            'legislationFile' => $legislationFile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LegislationFile  $legislationFile
     * @return \Illuminate\Http\Response
     */
    public function edit(LegislationFile $legislationFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LegislationFile  $legislationFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LegislationFile $legislationFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LegislationFile  $legislationFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(LegislationFile $legislationFile)
    {
        $legislations = Legislation::withCount('legislationFiles')->where('id', $legislationFile->legislation_id)->first();
        if (Storage::exists('public/legislation_files/'.$legislationFile->filename)) {
            Storage::delete('public/legislation_files/'.$legislationFile->filename);
            $legislationFile->delete();
            if ($legislations->legislation_files_count == 1) {
                $legislations->delete();
            }
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
