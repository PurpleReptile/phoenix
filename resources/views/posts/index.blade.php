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
    </div>
</div>

@endsection