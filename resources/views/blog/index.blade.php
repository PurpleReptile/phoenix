@extends('main')

@section('title', '| Blog')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-2">
            <div id="block_categories" data-spy="affix" data-offset-top="65">
                <h3>Категории</h3>
                <ul class="welcome_li">
                    <li class="invalid nav-item">
                        <a>| Авто<span class="label label-span">15</span></a>
                    </li>
                    <li class="invalid nav-item">
                        <a>| Наука<span class="label label-span">7</span></a>
                    </li>
                    <li class="invalid nav-item">
                        <a>| Спорт<span class="label label-span">3</span></a>
                    </li>
                    <li class="invalid nav-item">
                        <a>| Природа<span class="label label-span">19</span></a>
                    </li>
                    <li class="invalid nav-item">
                        <a>| Интернет<span class="label label-span">21</span></a>
                    </li>
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
                        <a class="link_post" title="авто">авто</a>,
                        <a class="link_post" title="природа">природа</a>,
                        <a class="link_post" title="интернет">интернет</a>
                    </p>
                    <p class="right_paragraph">
                        Опубликовал: Василий Петрович, {{ date('j-m-Y', strtotime($post->created_at)) }}
                    </p>
                </div>
                {{-- <div class="image_post">
                    <img class="img-thumbnail" src="../../../public/img/blogs/blog_1.jpg" />
                </div> --}}
                <div class="content_post">
                    <p class="text-justify">
                        {{ mb_substr($post->body, 0, 800) }}{{ strlen($post->body) > 800 ? "..." : "" }}
                    </p>
                </div>
                <div class="view_post">
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn_general" role="button" title="Читать дальше">Читать дальше</a>
                </div>
            </div>
            @endforeach

        </div>

    </div>

</div>

@endsection