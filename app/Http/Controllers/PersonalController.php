<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Role;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function personalDepartment($group = null)
    {
        if ($group != null) {

            $personals = Personal::department($group)->active()->orderBy('id', 'asc')->get();

        } else {
            return abort(404);
        }
        return view('personal',[
            'personals' => $personals,
            'group' => $group,

        ]);
    }
}
