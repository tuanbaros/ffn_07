<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\Country;
use App\Team;
use App\News;
use App\League;
use Auth;

class TeamController extends Controller
{
    public function show($id)
    {
        $categories = Category::all();
        $countries = Country::all();
        $team = Team::findOrFail($id);
        $leagues = League::all();
        $otherNews = News::getNews(config('view.count_other_news'), 'created_at', 'desc')->get();
        $readestNews = News::getNews(config('view.count_readest_news'), 'view_number')->get();
        return view('user.team.team-info')->with([
            'categories' => $categories,
            'countries' => $countries,
            'team' => $team,
            'leaguesList' => $leagues,
            'ortherNews' => $otherNews,
            'readestNews' => $readestNews,
        ]);
    }
}
