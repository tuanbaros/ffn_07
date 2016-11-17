@extends('layouts.admin.app')
@extends('layouts.admin.menu')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    @lang('admin.user')
                    <small>@lang('admin.list')</small>
                </h1>
            </div>

            <div class="col-lg-12">
                @include('admin.shared.flash')
            </div>

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="colum" width="8%">@lang('admin.index')</th>
                        <th class="colum" width="20%">@lang('admin.lb_name')</th>
                        <th class="colum" width="20%">@lang('admin.email')</th>
                        <th class="colum">@lang('admin.avatar')</th>
                        <th class="colum">@lang('admin.create_at')</th>
                        <th class="colum" width="8%">@lang('admin.active')</th>
                        <th class="colum" width="10%">@lang('admin.delete')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr class="odd gradeX" align="center">
                        <td>{!! $key + 1 !!}</td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        @if (empty($user->avatar))
                            <td>{!! Html::image(Lang::get('admin.default-avatar'), Lang::get('admin.none'), 
                                    ['width' => '100px', 'height' => '100px']) !!}</td>
                        @else
                            <td>{!! Html::image($user->avatar, Lang::get('admin.none'), 
                                    ['width' => '100px', 'height' => '100px']) !!}</td>
                        @endif
                        <td>{!! $user->created_at->format('d-m-Y') !!}</td>
                        <td class="center">
                            {!! Form::open(['method' => 'PATCH', 'route' => ['admin.users.update', $user] ]) !!}
                                @if ($user->is_active)
                                    {!! Form::submit(Lang::get('admin.actived'), ['class' => 'btn btn-default']) !!}
                                @else
                                    {!! Form::submit(Lang::get('admin.active'), ['class' => 'btn btn-primary']) !!}
                                @endif
                            {!! Form::close() !!}
                        </td>
                        <td class="center">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user], 
                                'id' => $user->id]) !!}
                                {!! Form::submit(Lang::get('admin.delete'), ['class' => 'btn btn-danger', 
                                    'id' => $user->id]) !!}
                                    <input type="hidden" user-id="{{ $user->id }}" id="delete">
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-lg-7" align="right">
                {!! $users->render() !!}
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
    {{ Html::script('admin_asset/js/users.js') }}
    <script>
        var users = new users();
        users.init();
    </script>
@stop
