@extends('main')

@section('title', '| Редактирование поста')

@section('content')

<div class="container">
    <div class="row">

        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}

        <div class="col-md-8">
            {{ Form::label('title', 'Заголовок:') }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, ['class' => 'form-control']) }}

            {{ Form::label('body', 'Содержимое:') }}
            {{ Form::textarea('body', null, ["class" => 'form-control']) }}
        </div>

        <div class="col-md-4">
            <div id="block_edit_post">

                <div class="well">

                    <dl class="dl-horizontal">
                        <label>Создан:</label>
                        <p>{{ date('j F Y H:i', strtotime($post->created_at)) }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Обновлён:</label>
                        <p>{{ date('j F Y H:i', strtotime($post->updated_at)) }}</p>
                    </dl>
                    <hr>

                    <div clas="row">
                        <div class="col-md-6">
                            {!! Html::linkRoute('posts.show', 'Отмена', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
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
