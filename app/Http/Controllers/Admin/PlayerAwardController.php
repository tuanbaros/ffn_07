<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PlayerAward;
use App\Player;
use App\LeagueSeason;
use App\Match;
use Lang;

class PlayerAwardController extends Controller
{
    public function index()
    {
        $awards = PlayerAward::paginate(config('view.paginate'));
        return view('admin.player_award.index', compact('awards'));
    }

    public function create()
    {
        $league_seasons = LeagueSeason::all()->lists('year', 'id');
        return view('admin.player_award.create', compact('league_seasons'));
    }

    public function getMatch($id)
    {
        $leagueSeason = LeagueSeason::find($id);
        $matchs = $leagueSeason->matchs;
        return view('admin.player_award.match', compact('matchs'));
    }

    public function getPlayer($id)
    {
        $match = Match::find($id);
        $team1 = $match->findTeam($match->team1_id);
        $team2 = $match->findTeam($match->team2_id);
        $players = $team1->players->merge($team2->players);
        return view('admin.player_award.player', compact('players'));
    }

    public function store(Request $request)
    {
        $award = new PlayerAward;
        $data = $request->only('name', 'match_id', 'league_season_id', 'player_id');
        if ($award->validate($data, 'storeRule')) {
            if ($award->findAward($data['name'], $data['match_id'])->count() < 1) {
                PlayerAward::create($data);
                return redirect()->route('admin.player_award.index')->with([
                    'flash_level' => Lang::get('admin.success'),
                    'flash_message' => Lang::get('admin.message.complate', ['name' => 'Award'])
                ]);
            } 
            return redirect()->route('admin.player_award.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.exists')
            ]);
        }
        return redirect()->back()->withErrors($award->valid());
    }

    public function edit($id)
    {
        $award = PlayerAward::find($id);
        if (!$award) {
            return redirect()->route('admin.player_award.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Award'])
            ]);
        }
        $league_seasons = LeagueSeason::all()->lists('year', 'id');
        return view('admin.player_award.edit', compact('award', 'league_seasons'));
    }

    public function update(Request $request, $id)
    {
       $award = PlayerAward::find($id);
       if (!$award) {
            return redirect()->route('admin.player_award.update')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Award'])
            ]);
        }
        $data = $request->only('name', 'match_id', 'league_season_id', 'player_id');
        if ($award->validate($data, 'updateRule')) {
            $award->update($data);
            return redirect()->route('admin.player_award.index')->with([
                'flash_level' => Lang::get('admin.success'),
                'flash_message' => Lang::get('admin.message.edit_success', ['name' => 'Award'])
            ]);
        }
        return redirect()->back()->withErrors($award->valid());
    }

    public function destroy($id)
    {
        $award = PlayerAward::find($id);
        if (!$award) {
            return redirect()->route('admin.player_award.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'Award'])
            ]);
        }
        $award->delete();
        return redirect()->route('admin.player_award.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.delete_success', ['name' => 'Award'])
        ]);
    }
}
