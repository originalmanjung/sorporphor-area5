<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function budgetAll()
    {
        $budgets = Budget::latest()->paginate(8);
        return view('budget.budgetAll',[
            'budgets' => $budgets
        ]);
    }

    public function budgetShow($budget)
    {
        $budget = Budget::where('slug', $budget)->firstOrFail();
        return view('budget.budgetShow',[
            'budget' => $budget
        ]);
    }
}
