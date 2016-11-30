<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\News;
use Lang;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home')->with([
            'categories' => Category::newsInCategory(config('view.count_news_in_one_category')),
            'hotNews' => News::getNews(config('view.count_hot_news'))->get(),
            'titleNews' => News::getNews(config('view.count_news_is_title'), 'created_at',
                'desc', config('view.offset_of_news_is_title'))->get(),
            'readestNews' => News::getNews(config('view.count_readest_news'), 'view_number')->get(),
            'otherNews' => News::getNews(config('view.count_other_news'), 'created_at',
                'desc', config('view.offset_of_news_is_other'))->get(),
        ]);
    }
}
