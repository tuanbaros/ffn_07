@extends('layouts.admin.app')
@extends('layouts.admin.menu')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1">
                <h1 class="page-header">
                    @lang('admin.player_award')
                    <small>@lang('admin.edit')</small>
                </h1>
            </div>

            <div class="col-lg-7 col-lg-offset-1" id="form-add">
                @include('admin.shared.error')

                {!! Form::model($award, ['method' => 'PUT', 'route' => ['admin.player_award.update',
                    $award->id ]]) !!}

                    <div class="form-group">
                        {!! Form::label('name', Lang::get('admin.name',['name' => 'Award'])) !!}
                        {!! Form::text('name', null, ['class' => 'form-control'])!!}
                    </div>

                   <div class="form-group">
                       {!! Form::label('league_season_id', Lang::get('admin.league_season')) !!}
                       {!! Form::select('league_season_id', $league_seasons, null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.choose', ['name' => 'League Season'])
                       ]) !!}
                   </div>

                   <div class='form-group' id='matchs'>
                   </div>

                   <div class='form-group' id='players'>
                   </div>

                    <div class="form-group">
                        {!! Form::submit(Lang::get('admin.bt_edit', ['name' => 'Award']), 
                            ['class' => 'btn btn-default']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
{{ Html::script('admin_asset/js/award.js') }}
<script>
    var award = new award;
    award.init();
    award.getMatch($('#league_season_id').val());
    award.getPlayer($('#league_season_id').val());
    award.setMatch({{ $award->match_id }});
    award.setPlayer({{ $award->player_id }});
</script>
@stop
