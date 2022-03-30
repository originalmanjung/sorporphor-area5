<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Complaint;
use App\Models\Opinion;
use App\Models\Question;
use App\Models\News;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $complaints = Complaint::all();
        $opinions = Opinion::all();
        $questions = Question::all();
        $news = News::all();

        return view('admin.dashboard',[
            'users' => $users,
            'complaints' => $complaints,
            'opinions' => $opinions,
            'questions' => $questions,
            'news' => $news,
            
        ]);
    }
}
