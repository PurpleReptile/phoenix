@extends('main')

@section('title', '| '.$post->title)

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-2">
            <div id="block_categories">
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
            <div id="block_post" class="content">
                <div class="title_post">
                    <h2>{{ $post->title }}</h2>
                </div>
                <div class="info_about_post">
                    <p>Тема:
                    	<a class="link_post" title="{{ mb_convert_case($post->category->name, MB_CASE_LOWER, "UTF-8") }}">{{ mb_convert_case($post->category->name, MB_CASE_LOWER, "UTF-8") }}</a>
                    </p>
                    <p class="right_paragraph">
                    	Опубликовал: Иван Петрович, {{date('j-m-Y', strtotime($post->created_at)) }}
                    </p>
                </div>
                <div class="image_post">
                	<img class="img-thumbnail" src="../../../public/img/blogs/blog_1.jpg" />
                </div>
                <div class="content_post">
                	<p class="text-justify">
                		{{ $post->body}}
                	</p>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection