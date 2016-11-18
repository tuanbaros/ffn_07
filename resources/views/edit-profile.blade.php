@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        <h2><b>@lang('profile.profile')</b></h2>
        <div class="form-group">
            {!! Form::label('email', Lang::get('profile.email')) !!}
            {!! Form::email('email', Auth::user()->email, ['class' => 'form-control', 'disabled' => 'true']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', Lang::get('profile.fullname')) !!}
            {!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'id' => 'name', 'users' => Auth::user()->id]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('avatar', Lang::get('profile.avatar')) !!}
            <br>
            @if (empty(Auth::user()->avatar))
                {{ Html::image('/images/avatar.png', 'Image Not Found', ['class' => 'img-circle', 'id' => 'avatar', 'width' => '200', 'height' => '200']) }}
            @else
                {{ Html::image(Auth::user()->avatar, '', ['class' => 'img-circle', 'id' => 'avatar', 'width' => '200', 'height' => '200', 'default' => Auth::user()->avatar]) }}
            @endif
            <br><br>
            <input type="file" name="fileUpload" id="fileUpload">
            <br>
            <button class="btn btn-primary">@lang('profile.update')</button>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('/js/profile.js') }}"></script>
    <script>
        var f = new firebaseCustom();
        f.init({!! json_encode(Config::get('firebase')) !!});
        var profile = new profile();
        profile.init(f);
    </script>
@endsection
