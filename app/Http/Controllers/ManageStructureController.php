<?php

namespace App\Http\Controllers;

use App\Models\ManageStructure;
use Illuminate\Http\Request;

class ManageStructureController extends Controller
{
    public function index()
    {
        $manageStructures = ManageStructure::all();
        return view('manageStructure.index',[
            'manageStructures' => $manageStructures
        ]);
    }
}
