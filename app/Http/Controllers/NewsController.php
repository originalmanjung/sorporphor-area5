<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function newsGeneralAll()
    {
        $news = News::general()->orderBy('created_at')->paginate(8);
        $titleNews = 'กิจกรรม สพป.';
        return view('news.newsAll',[
            'news' => $news,
            'titleNews' => $titleNews
        ]);
    }

    public function newsHonestAll()
    {
        $news = News::honest()->orderBy('created_at')->paginate(8);
        $titleNews = 'กิจกรรมเขตพื้นที่สุจริต/การมีส่วนร่วมของผู้บริหาร';
        return view('news.newsAll',[
            'news' => $news,
            'titleNews' => $titleNews
        ]);
    }

    public function newsCultureAll()
    {
        $news = News::culture()->orderBy('created_at')->paginate(8);
        $titleNews = 'กิจกรรมเขตพื้นที่สุจริต/การมีส่วนร่วมของผู้บริหาร';
        return view('news.newsAll',[
            'news' => $news,
            'titleNews' => $titleNews
        ]);
    }

    public function newsParticipationAll()
    {
        $news = News::participation()->orderBy('created_at')->paginate(8);
        $titleNews = 'กิจกรรมเขตพื้นที่สุจริต/การมีส่วนร่วมของผู้บริหาร';
        return view('news.newsAll',[
            'news' => $news,
            'titleNews' => $titleNews
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
