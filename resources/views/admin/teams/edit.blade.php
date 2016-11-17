@extends('layouts.admin.app')

@section('content')
    <div id="page-wrapper" onload="onload_image()">
        <div class="container-fluid">
            <h1 class="page-header">@lang('teams.edit_team')</h1>
        </div>
        <div class="space20"></div>
        <div class="col-md-12">
            @include('admin.shared.flash')
            @include('admin.shared.error')
            @if ($team)
                {!! Form::model($team, ['method' => 'PUT', 'route' => ['admin.teams.update', $team->id], 'class' => 'form']) !!}
                    <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                        {!! Form::label('country_id', Lang::get('teams.select_country')) !!}
                        {!! Form::select('country_id', $countries, null, ['class' => 'form-control',
                            'placeholder' => Lang::get('teams.select_country'), 'required']) !!}
                        @if ($errors->has('country_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', Lang::get('teams.team_name')) !!}
                        {!! Form::text('name', null, ['class' => 'form-control',
                            'placeholder' => Lang::get('teams.team_name'), 'required']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                        {!! Form::label('introduction', Lang::get('teams.team_introduction')) !!}
                        {!! Form::text('introduction', null, ['class' => 'form-control',
                            'placeholder' => Lang::get('teams.team_introduction'), 'required']) !!}
                        @if ($errors->has('introduction'))
                            <span class="help-block">
                                <strong>{{ $errors->first('introduction') }}</strong>
                            </span>
                        @endif
                    </div>
                
                    <div class="form-group">
                        @if ($team->logo)
                            {!! Html::image($team->logo, null, ['class' => 'img-circle', 'id' => 'avatar', 'width' => '200', 'height' => '200']) !!}
                        @endif
                        <br><br>
                        {!! Form::file('avatar-file', ['id' => 'avatar-file']) !!}
                        {!! Form::hidden('logo', null, ['id' => 'logo']) !!}
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit( Lang::get('teams.edit_team'), ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
                <script type="text/javascript" src="{{ asset('admin_asset/js/teams.js') }}"></script>
                <script type="text/javascript">
                    var f = new firebaseCustom();
                    var t = new team();
                    f.init({
                        apiKey: '{{ config('firebase.apiKey') }}',
                        authDomain: '{{ config('firebase.authDomain') }}',
                        databaseURL: '{{ config('firebase.databaseURL') }}',
                        storageBucket: '{{ config('firebase.storageBucket') }}',
                        messagingSenderId: '{{ config('firebase.messagingSenderId') }}',
                    });
                    t.init(f);
                </script>
            @else
                <p>
                    <div class="alert alert-danger">
                        @lang('teams.not_search_team')
                    </div>
                </p>	
            @endif
        </div>
    </div>
@stop
