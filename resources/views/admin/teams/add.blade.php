@extends('layouts.admin.app')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">@lang('teams.add_team')</h1>
        </div>

        <div class="space20"></div>
        <div class="col-md-11">
            @include('admin.shared.flash')
            @include('admin.shared.error')
            {!! Form::open(['route'=>'admin.teams.store', 'class'=>'form']) !!}
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
                    {!! Html::image(null, null, ['class' => 'img-circle', 'id' => 'avatar', 'width' => '200', 'height' => '200']) !!}
                    <br><br>
                    {!! Form::file('avatar-file', ['id' => 'avatar-file']) !!}
                    {!! Form::hidden('logo', null, ['id' => 'logo']) !!}
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" 
                        aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
                <div class="form-group">
                    {!! Form::submit( Lang::get('teams.add_team'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::reset( Lang::get('teams.reset'), ['class' => 'btn btn-default']) !!}
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
        </div>
    </div>
@stop
