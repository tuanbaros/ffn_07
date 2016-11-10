@extends('layouts.admin.app')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">@lang('categories.category_add_header')</h1>
        </div>
        <div class="space20"></div>
        <div class="col-md-12">
            @if(Session::has('flash_message'))
                <p>
                    <div class="alert alert-info">
                        {{Session::get('flash_message')}}
                    </div>
                </p>
            @endif

            @if ( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif    
            {!! Form::open(['route'=>'admin.categories.store', 'class'=>'form']) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', Lang::get('categories.category_name') ) !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 
                        'placeholder'=> Lang::get('categories.category_name'), 'required']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                {!! Form::submit( Lang::get('categories.add_category'), ['class'=>'btn btn-primary']) !!}
                {!! Form::reset( Lang::get('categories.reset_category'), ['class'=>'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
