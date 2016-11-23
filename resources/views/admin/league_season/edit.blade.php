@extends('layouts.admin.app')
@extends('layouts.admin.menu')

@section('content')

<div id='page-wrapper'>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-lg-12 col-lg-offset-1'>
                <h1 class='page-header'>
                    @lang('admin.league_season')
                    <small>@lang('admin.edit')</small>
                </h1>
            </div>

            <div class='col-lg-7 col-lg-offset-1'>
                {!! Form::model($season, ['method' => 'PUT', 'route' => ['admin.league_season.update', $season->id]]) !!}
                    @include('admin.shared.error')

                    <div class='form-group'>
                        {!! Form::label('year', Lang::get('admin.year')) !!}
                        {!! Form::text('year', null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.holder', ['name' => 'Year'])
                        ]) !!}
                    </div>

                    <div class='form-group'>
                        {!! Form::label('league_id', Lang::get('admin.league')) !!}
                        {!! Form::select('league_id', $leagues, null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.choose', ['name' => 'League'])
                        ]) !!}
                    </div>

                    <div class='form-group'>
                        {!! Form::submit(Lang::get('admin.bt_edit', ['name' => 'League Season']),
                            ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
