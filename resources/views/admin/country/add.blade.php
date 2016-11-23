@extends('layouts.admin.app')
@extends('layouts.admin.menu')

@section('content')

<div id='page-wrapper'>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-lg-12 col-lg-offset-1'>
                <h1 class='page-header'>
                    @lang('admin.country')
                    <small>@lang('admin.add')</small>
                </h1>
            </div>

            <div class='col-lg-7 col-lg-offset-1' id='form-add'>
                @include('admin.shared.error')

                {!! Form::open(['route' => 'admin.country.store' ]) !!}
                    <div class='form-group'>
                        {!! Form::label('name', trans('admin.name',['name' => 'Country'])) !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control', 
                            'placeholder' => trans('admin.message.holder', ['name' => 'Country']) ]) 
                        !!}
                    </div>

                    <div class='form-group'>
                        {!! Form::label('code', trans('admin.code')) !!}
                        {!! Form::text('code', null, [
                            'class' => 'form-control', 
                            'placeholder' => trans('admin.message.holder', ['name' => 'Code']) ]) 
                        !!}
                    </div>

                    <div class='form-group'>
                        {!! Form::submit(trans('admin.bt_add', ['name' => 'country']), 
                            ['class' => 'btn btn-default']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
