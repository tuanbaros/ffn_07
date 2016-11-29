<h3 class='page-header margin-top0-imp'><a href=''>@lang('news.other_news')</a></h3>
@foreach ($ortherNews as $key => $element)
    @if ($key == 0)
        <div class='icon-slide-container'>
            <a href="{{ route('news.show', $element->id) }}">
                <img src='{{ $element->title_image }}' class='img-responsive slide-icon img-thumbnail'
                    title='{{ $element->title }}' alt='{{ $element->title }}'>
            </a>
        </div>
    @endif
    <div class='space10'></div>
    <p class='marg'>
        <a href="{{ route('news.show', $element->id) }}">{{ $element->title }}</a>
    </p>
    <div class='break'></div>
@endforeach
