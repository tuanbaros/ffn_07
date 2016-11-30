{!! Form::label('match_id', Lang::get('admin.match')) !!}
<select class='form-control' id='match' name='match_id'>
    <option value="">{{ Lang::get('admin.choose', ['name' => 'Match']) }}</option>
    @foreach ($matchs as $key => $match)
        <option value='{{ $match->id }}'>{{ $match->findTeam($match->team1_id)->name }} - 
        {{ $match->findTeam($match->team2_id)->name }}</option>
    @endforeach
</select>
