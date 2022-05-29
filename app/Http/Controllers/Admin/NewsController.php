<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(News::class, 'news');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('newsphotos')->orderBy('created_at', 'desc')->get();
        return view('admin.news.index',[
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.news.create');
        return view('admin.news.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        Gate::authorize('app.news.create');
        $news = News::create([
            'title' => $request->title,
            'description' => $request->description,
            'conditions' => $request->conditions,
            'user_id' => auth()->user()->id,
            'status' => $request->filled('status')
        ]);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            News::UploadFile($file, $news);
        }
        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return redirect()->route('app.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show',[
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        Gate::authorize('app.news.edit');
        return view('admin.news.form',[
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        Gate::authorize('app.news.edit');
        $news->update([
            'title' => $request->title,
            'description' => $request->description,
            'conditions' => $request->conditions,
            'status' => $request->filled('status')
        ]);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            News::UploadFile($file, $news);
        }
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        Gate::authorize('app.news.destroy');
        $news->delete();
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return redirect()->route('app.news.index');
    }
}
