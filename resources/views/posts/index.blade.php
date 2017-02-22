@extends('main')

@section('title', '| Блог')

@section('content')

<div class='container'>

    <div class="row" id="top_panel_show_posts">
        <div class='col-md-10'>
            <h1>Все посты</h1>
        </div>

        <div class='col-md-2'>
            <a href='{{ route('posts.create') }}' class='btn btn_general btn-block'>Создать пост</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-hover">

                <thead>
                    <th>#</th>
                    <th>Заголовок</th>
                    <th>Содержимое</th>
                    <th>Создан</th>
                    <th></th>
                </thead>

                <tbody>

                    @foreach($posts as $post)

                    <tr>
                        <td> {{ $post->id }} </td>
                        <td> {{ $post->title }} </td>
                        <td> {{ mb_substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                        <td> {{ date('j F Y', strtotime($post->created_at)) }} </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn_general btn-sm">Показать</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn_general btn-sm">Редактировать</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {!! $posts->links(); !!}
            </div>

        </div>

        </div>
    </div>

</div>

@endsection
