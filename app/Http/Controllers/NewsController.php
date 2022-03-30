<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function newsAll()
    {
        $news = News::active()->orderBy('created_at')->paginate(8);
        return view('news.newsAll',[
            'news' => $news
        ]);
    }

    public function newsShow($news)
    {
        $news = News::with('newsphotos')->slug($news)->firstOrFail();
        return view('news.newsShow',[
            'news' => $news
        ]);
    }
}
