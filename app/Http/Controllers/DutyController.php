<?php

namespace App\Http\Controllers;

use App\Models\Duty;
use Illuminate\Http\Request;

class DutyController extends Controller
{
    public function index()
    {
        $dutys = Duty::all();
        return view('duty.index',[
            'dutys' => $dutys
        ]);
    }
}
