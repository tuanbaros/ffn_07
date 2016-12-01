<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\Country;
use App\News;
use App\League;

class NewsCategoryController extends Controller
{
    public function show($id)
    {
        $categories = Category::all();
        $countries = Country::all();
        $leagues = League::all();
        return view('user.news.news_list')->with([
            'categories' => $categories,
            'countries' => $countries,
            'leaguesList' => $leagues,
            'category' => Category::findOrFail($id),
            'ortherNews' => News::getNewsByCategory($id, config('view.count_other_news'))->get(),
            'news' => News::getNewsByCategory($id)->paginate(config('view.count_news_in_news_category')),
            'titleNews' => News::getNewsIsTitle($id,
                config('view.count_title_news_in_news_category'),
                config('view.hot_default'))->get(),
            'readestNews' => News::getNews(config('view.count_readest_news_in_news_category'), 'view_number')->get(),
        ]);
    }
}
