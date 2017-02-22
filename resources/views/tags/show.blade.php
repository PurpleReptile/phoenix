@extends('main')

@section('title', "| Тэг $tag->name")

@section('content')

<div class="container">
    <div class="page-header">
        <div class="row">
            <div class="col-md-8">
                <h1>Тэг {{ $tag->name }} <small>{{ $tag->posts()->count() }} публикаций</small></h1>
            </div>
            <div class="col-md-2">
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn_general pull-right" title="Редактировать">Редактировать</a>
            </div>
            <div class="col-md-2">
                {{ Form::open(['route' => ['tags.destroy', $tag->id, 'method' => 'DELETE']]) }}
                    {{ Form::submit('Удалить', ['class' => 'btn btn-block btn_general'])}}
                {{ Form::close() }}
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Тэги</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($tag->posts as $post)
                    
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>@foreach($post->tags as $tag)
                            <span class="label label-default">{{$tag->name }}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ route('posts.show', $post->id)}}" class="btn btn-xs btn_general">Показать</a></td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection