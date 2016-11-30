{!! Form::label('player_id', Lang::get('admin.player')) !!}
<select class='form-control' id='player' name='player_id'>
    <option value="">{{ Lang::get('admin.choose', ['name' => 'Player']) }}</option>
    @foreach ($players as $key => $player)
        <option value='{{ $player->id }}'>{{ $player->name }}</option>
    @endforeach
</select>
