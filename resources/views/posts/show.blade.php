@extends ('main')

@section('title', '| Просмотр поста')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8">
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
                        Опубликовал: Иван Петрович, {{date('j-m-Y', strtotime($post->created_at)) }}
                    </p>
                </div>
                <div class="image_post">
                    <img class="img-thumbnail" src="" />
                </div>
                <div class="content_post">
                    <p class="text-justify">
                        {{ $post->body }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div id="block_edit_post">

                <div class="well well-sm">

                    <dl class="dl-horizontal">
                        <dt>Создан:</dt>
                        <dd>{{ date('j F Y H:i', strtotime($post->created_at)) }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Обновлён:</dt>
                        <dd>{{ date('j F Y H:i', strtotime($post->updated_at)) }}</dd>
                    </dl>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.edit', 'Редактировать', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">

                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Удалить', ['class' => 'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            {{ Html::linkRoute('posts.index', '<< Все посты', [], ['class' => 'btn btn-default btn-block']) }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection