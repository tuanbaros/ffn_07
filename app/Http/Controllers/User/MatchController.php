<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Match;
use App\Country;
use App\Category;
use App\League;

class MatchController extends Controller
{
    public function matchInDay()
    {
        $match = Match::all();
        $categories = Category::all();
        $countries = Country::all();
        $leagues = League::all();
        return view('user.match.match')->with([
            'categories' => $categories,
            'country' => $countries,
            'match' => $match,
            'leaguesList' => $leagues,
        ]);
    }
}
