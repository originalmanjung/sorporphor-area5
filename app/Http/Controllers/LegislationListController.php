<?php

namespace App\Http\Controllers;

use App\Models\LegislationList;
use Illuminate\Http\Request;

class LegislationListController extends Controller
{

    public function PlanWork()
    {
        $legislationLists = LegislationList::with('legislations')->manualplanwork()->active()->first();
        return view('legislationList.legislationListPlanWork',[
            'legislationLists' => $legislationLists
        ]);
    }

    public function ManualWork()
    {
        $legislationLists = LegislationList::with('legislations')->manualwork()->active()->first();
        return view('legislationList.legislationListManualWork',[
            'legislationLists' => $legislationLists
        ]);
    }
}
