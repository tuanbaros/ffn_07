@extends('layouts.admin.app')
@extends('layouts.admin.menu')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1">
                <h1 class="page-header">
                    @lang('admin.country')
                    <small>@lang('admin.edit')</small>
                </h1>
            </div>

            <div class="col-lg-7 col-lg-offset-1" id="form">
                @include('admin.shared.error')

                {!! Form::model($country, ['method' => 'PUT', 'route' => ['admin.country.update', $country->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('name', Lang::get('admin.name', ['name' => 'Country'])) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('code', Lang::get('admin.code')) !!}
                        {!! Form::text('code', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit(Lang::get('admin.bt_edit', ['name' => 'country']),
                            ['class' => 'btn btn-default']) !!}
                    </div>
                    
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
