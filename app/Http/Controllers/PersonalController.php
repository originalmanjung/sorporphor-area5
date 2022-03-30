<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Role;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function personalDepartment($slug = null)
    {
        if ($slug != null) {
            $id = Role::where('slug', $slug)->firstOrFail()->id;
            $personals = Personal::department($id)->active()->orderBy('id', 'asc')->get();
        } else {
            $personals = Personal::manager()->active()->orderBy('id', 'asc')->get();
        }
        return view('personal',[
            'personals' => $personals
        ]);
    }
}
