@extends('main')

@section('title', '| Редактирование записи')

@section('content')

<div class="container">
    <div class="row">

        {!! Form::model($application, ['route' => ['applications.update', $application->id], 'method' => 'PUT']) !!}

        <div class="col-md-8">
            {{ Form::label('name', 'Название:') }}
            {{ Form::text('name', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('theme', 'Тема:') }}
            {{ Form::text('theme', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('author_post', 'Автор:') }}
            {{ Form::text('author_post', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('author_application', 'Разработчик:') }}
            {{ Form::text('author_application', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('image', 'Изображение:') }}
            {{ Form::textarea('image', null, ["class" => 'form-control']) }}

            {{ Form::label('description', 'Описание:') }}
            {{ Form::textarea('description', null, ["class" => 'form-control']) }}

            {{ Form::label('link', 'Ссылка:') }}
            {{ Form::text('link', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('view_link', 'Отображение ссылки:') }}
            {{ Form::text('view_link', null, ["class" => 'form-control input-lg']) }}

        </div>

        <div class="col-md-4">
            <div id="block_edit_post">

                <div class="well">

                    <dl class="dl-horizontal">
                        <dt>Запись создана:</dt>
                        <dd>{{ date('j F Y H:i', strtotime($application->created_at)) }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Запись обновлена:</dt>
                        <dd>{{ date('j F Y H:i', strtotime($application->updated_at)) }}</dd>
                    </dl>
                    <hr>

                    <div clas="row">
                        <div class="col-md-6">
                            {!! Html::linkRoute('applications.show', 'Отмена', array($application->id), array('class' => 'btn btn-danger btn-block')) !!}
                        </div>
                        <div class="col-md-6">
                            {{ Form::submit('Сохранить', ['class' => 'btn btn-success btn-block']) }}
                        </div>
                    </div>
                    <hr>

                </div>

            </div>
        </div>
        {!! Form::close() !!}

    </div>

</div>

@stop
