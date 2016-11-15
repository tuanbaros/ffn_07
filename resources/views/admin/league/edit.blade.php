@extends('layouts.admin.app')
@extends('layouts.admin.menu')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1">
                <h1 class="page-header">
                    @lang('admin.league')
                    <small>@lang('admin.edit')</small>
                </h1>
            </div>
            <div class="col-lg-7 col-lg-offset-1">
                {!! Form::model($league, ['method' => 'PUT', 'route' => ['admin.league.update', 
                    $league->id]]) !!}
                    @include('admin.shared.error')

                    <div class="form-group">
                        {!! Form::label('name', Lang::get('admin.name', ['name' => 'League'])) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('country_id', Lang::get('Country')) !!}
                        {!! Form::select('country_id', $countries, null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.choose', ['name' => 'Country'])
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit(Lang::get('admin.bt_edit', ['name' => 'League']),
                            ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
