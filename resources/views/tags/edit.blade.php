@extends('main')

@section('title', '| Редактировать тэг')

@section('content')
    
<div class="container">
    {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}
    
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name', null, ['class' => 'form-control form_control']) }}
        
        {{ Form::submit('Сохранить изменения', ['btn btn_general']) }} 

    {{ Form::close() }}
    
</div>
@endsection