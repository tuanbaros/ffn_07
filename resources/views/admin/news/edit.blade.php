@extends('layouts.admin.app')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">@lang('news.edit_news')</h1>
        </div>
        <div class="space20"></div>
        <div class="col-md-12">
            @include('admin.shared.flash')
            @include('admin.shared.error')
            @if ($news)
                {!! Form::model($news, ['method' => 'PUT', 'route' => ['admin.news.update', $news->id], 'class' => 'form']) !!}
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
                        {!! Form::submit( Lang::get('news.edit_news'), ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
                <script type="text/javascript">CKEDITOR.replace('content');</script>
            @else
                <p>
                    <div class="alert alert-danger">
                        @lang('news.not_search_news')
                    </div>
                </p>	
            @endif
        </div>
    </div>
@stop
