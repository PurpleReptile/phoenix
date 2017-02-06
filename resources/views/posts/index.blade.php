@extends('main')

@section('title', '| Блог')

@section('content')

<div class='container'>

    <div class="row">
        <div class='col-md-10'>
            <h1>Все посты</h1>
        </div>

        <div class='col-md-2'>
            <a href='{{ route('posts.create') }}' class='btn btn_general'>Создать пост</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Create At</th>
                    <th></th>
                </thead>

                <tbody>

                    @foreach($posts as $post)

                    <tr>
                        <td> {{ $post->id}} </td>
                        <td> {{ $post->title}} </td>
                        <td> {{ substr($post->body, 0, 50)}}{{ strlen($post->body) > 50 ? "..." : "" }} </td>
                        <td> {{ date('j F Y', strtotime($post->created_at)) }} </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn_general btn-sm">Показать</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn_general btn-sm">Редактировать</a>
                        </td>

                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection