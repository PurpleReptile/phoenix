@extends('main')

@section('title', '| Создать новую запись')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<div id='block_create_post'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-8 col-md-offset-2'>

                <h1>Создать новую запись</h1>
                <hr>

                {!! Form::open(['route' => 'applications.store', 'data-parsley-validate']) !!}

                {{ Form::label('name', 'Название:') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '300')) }}

                {{ Form::label('theme', 'Тема:') }}
                {{ Form::text('theme', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '500')) }}

                {{ Form::label('author_post', 'Автор:') }}
                {{ Form::text('author_post', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '300')) }}

                {{ Form::label('author_application', 'Разработчик:') }}
                {{ Form::text('author_application', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '300')) }}

                {{ Form::label('image', 'Изображение:') }}
                {{ Form::textarea('image', null, array('class' => 'form-control', 'required' => '')) }}

                {{ Form::label('description', 'Описание:') }}
                {{ Form::textarea('description', null, array('class' => 'form-control', 'required' => '')) }}

                {{ Form::label('link', 'Ссылка:') }}
                {{ Form::text('link', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '700')) }}

                {{ Form::label('view_link', 'Отображение ссылки:') }}
                {{ Form::text('view_link', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '700')) }}

                {{ Form::submit('Создать запись', array('class' => 'btn btn_general btn-block')) }} 

                {!! Form::close() !!}

            </div> 
        </div>
    </div>
    
</div>

@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection