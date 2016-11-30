@extends('layouts.admin.app')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">@lang('news.add_news')</h1>
        </div>

        <div class="space20"></div>
        <div class="col-md-11">
            @include('admin.shared.flash')
            @include('admin.shared.error')
            {!! Form::open(['route'=>'admin.news.store', 'class'=>'form']) !!}
                <div class="form-group{{ $errors->has('cate_id') ? ' has-error' : '' }}">
                    {!! Form::label('cate_id', Lang::get('news.select_cate')) !!}
                    {!! Form::select('cate_id', $categories, null, ['class' => 'form-control',
                        'placeholder' => Lang::get('news.select_cate'), 'required']) !!}
                    @if ($errors->has('cate_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cate_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                    {!! Form::label('country_id', Lang::get('news.select_country')) !!}
                    {!! Form::select('country_id', $countries, null, ['class' => 'form-control',
                        'placeholder' => Lang::get('news.select_country'), 'required']) !!}
                    @if ($errors->has('country_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', Lang::get('news.news_title')) !!}
                    {!! Form::text('title', null, ['class' => 'form-control',
                        'placeholder' => Lang::get('news.news_title'), 'required']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description', Lang::get('news.news_description')) !!}
                    {!! Form::text('description', null, ['class' => 'form-control',
                        'placeholder' => Lang::get('news.news_description'), 'required']) !!}
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::checkbox('hot', 1) !!}
                    {!! Form::label('hot', Lang::get('news.news_hot')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('img-title', Lang::get('news.img_title')) !!}
                    {!! Html::image(null, null, ['class' => 'img-responsive', 'id' => 'avatar', 'height' => '200']) !!}
                    <br><br>
                    {!! Form::file('avatar-file', ['id' => 'avatar-file']) !!}
                    {!! Form::hidden('title_image', null, ['id' => 'title_image']) !!}
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" 
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    {!! Form::label('content', Lang::get('news.news_content')) !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control',
                        'placeholder' => Lang::get('news.news_content'), 'required']) !!}
                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::submit( Lang::get('news.create_new_news'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::reset( Lang::get('news.reset_news'), ['class' => 'btn btn-default']) !!}
                </div>
            {!! Form::close() !!}
            <script type="text/javascript">CKEDITOR.replace('content');</script>
            <script type="text/javascript" src="{{ asset('admin_asset/js/news.js') }}"></script>
        </div>
        <script type="text/javascript">
            var f = new firebaseCustom();
            var n = new news();
            f.init({
                apiKey: '{{ config('firebase.apiKey') }}',
                authDomain: '{{ config('firebase.authDomain') }}',
                databaseURL: '{{ config('firebase.databaseURL') }}',
                storageBucket: '{{ config('firebase.storageBucket') }}',
                messagingSenderId: '{{ config('firebase.messagingSenderId') }}',
            });
            n.init(f);
        </script>
    </div>
@stop
