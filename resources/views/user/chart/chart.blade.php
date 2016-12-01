@extends('layouts.user.app')
@section('title')
    @lang('user.rank')
@stop
@section('content')
    <h1 class='page-header'></h1>
    <ol class='breadcrumb'>
        <li><a href="{{ route('home') }}">@lang('text.home_title')</a></li>
        @if ($ranks)
            <li>
                <a href="{{ route('showCharts', $ranks[0]->leagueSeason->league->id) }}">
                    {{ $ranks[0]->leagueSeason->league->name }}
                </a>
            </li>
            <li>
                <a href="{{ route('showCharts', $ranks[0]->leagueSeason->id) }}">
                    {{ $ranks[0]->leagueSeason->year }}
                </a>
            </li>
        @endif
    </ol>
    <hr>
    <div class='row'>
        <div class='col-md-2 col-lg-2 col-sm-3 col-xs-3'>
            @include('user.news.other-news')
        </div>
        <div class='col-lg-7 col-sm-9 col-md-7 col-xs-9'>
            <h2 class='title-match-info'><b>@lang('user.football_rankings')</b></h2>
            <div>
                <ol class='breadcrumb'></ol>
            </div>
            @if ($ranks)
                <div><h3><b>@lang('user.league_season') {{ $ranks[0]->leagueSeason->year }}</b></h3></div>
                <div class='space20'></div>
                <div class='col-md-12 col-lg-12 col-sm-12 col-xs-12'>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th class='center-text' width='10%'></th>
                                <th class='center-text'>@lang('user.column_team')</th>
                                <th class='center-text'>@lang('user.column_match_sum')</th>
                                <th class='center-text'>@lang('user.column_won')</th>
                                <th class='center-text'>@lang('user.column_drawn')</th>
                                <th class='center-text'>@lang('user.column_lost')</th>
                                <th class='center-text'>@lang('user.column_gd')</th>
                                <th class='center-text'>@lang('user.column_score')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ranks as $key => $element)
                                <tr>
                                    <td align='center'>{{ $key + 1 }}</td>
                                    <td align='center'>
                                        <a href="{{ route('team.show', $element->team->id) }}">{{ $element->team->name }}</a>
                                    </td>
                                    <td align='center'>{{ $element->won + $element->drawn + $element->lost }}</td>
                                    <td align='center'>{{ $element->won }}</td>
                                    <td align='center'>{{ $element->drawn }}</td>
                                    <td align='center'>{{ $element->lost }}</td>
                                    <td align='center'>{{ $element->gd }}</td>
                                    <td align='center'>{{ $element->score }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class='col-lg-3 col-sm-12 col-md-3 col-xs-12'>
            @include('user.news.readest_news')
        </div>
    </div>
@stop
