<?php

namespace App\Http\Controllers;

use App\Models\LegislationList;
use Illuminate\Http\Request;

class LegislationListController extends Controller
{

    public function PlanWork()
    {
        $legislationLists = LegislationList::with('legislations')->menualplanwork()->active()->firstOrFail();
        return view('legislationList.legislationListPlanWork',[
            'legislationLists' => $legislationLists
        ]);
    }

    public function MenualWork()
    {
        $legislationLists = LegislationList::with('legislations')->menualwork()->active()->firstOrFail();
        return view('legislationList.legislationListMenualWork',[
            'legislationLists' => $legislationLists
        ]);
    }
}
