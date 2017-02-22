@extends('main')

@section('title', '| Blog')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-2">
            <div class="hidden-xs hidden-sm" id="block_categories" data-spy="affix" data-offset-top="65">
                <h3>Категории</h3>
                <ul class="welcome_li">

                    @foreach($categories as $category)

                        <li class="invalid nav-item">
                            <a>| {{ $category->name }}<span class="label label-span">{{ $category->count }}</span></a>
                        </li>

                    @endforeach

                </ul>
            </div>
        </div>

        <div class="col-md-8">

            @foreach($posts as $post)
            <div id="block_post" class="content">
                <div class="title_post">
                    <h2>{{ $post->title }}</h2>
                </div>
                <div class="info_about_post">
                    <p>Тема:
                        <a class="link_post" title="{{ mb_convert_case($post->category->name, MB_CASE_LOWER, "UTF-8") }}">{{ mb_convert_case($post->category->name, MB_CASE_LOWER, "UTF-8") }}</a>
                    </p>
                    <p class="right_paragraph">
                        Опубликовал: Василий Петрович, {{ date('j-m-Y', strtotime($post->created_at)) }}
                    </p>
                </div>
                <div class="image_post">
                    <img class="img-thumbnail" src="{{ asset('images/' . $post->image) }}" >
                </div>
                <div class="content_post">
                    <p class="text-justify">
                        {{ mb_substr(strip_tags($post->body), 0, 800) }}{{ strlen(strip_tags($post->body)) > 800 ? "..." : "" }}
                    </p>
                </div>
                <div class="view_post">
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn_general" role="button" title="Читать дальше">Читать дальше</a>
                </div>
            </div>
            @endforeach

            <div class="text-center">
                {!! $posts->links(); !!}
            </div>

        </div>

    </div>

</div>

@endsection