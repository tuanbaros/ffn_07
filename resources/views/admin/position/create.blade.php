@extends('layouts.admin.app')
@extends('layouts.admin.menu')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1">
                <h1 class="page-header">
                    @lang('admin.position')
                    <small>@lang('admin.add')</small>
                </h1>
            </div>

            <div class="col-lg-7 col-lg-offset-1">
                {!! Form::open(['route' => 'admin.position.store']) !!}
                    @include('admin.shared.error')

                    <div class="form-group">
                        {!! Form::label('name', Lang::get('admin.name', ['name' => 'Position'])) !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.holder', ['name' => 'Position'])
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit(Lang::get('admin.bt_add', ['name' => 'Position']),
                            ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
