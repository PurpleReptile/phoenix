@extends ('main')

@section('title', '| Просмотр приложения')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <div id="block_post" class="content">
                <div class="title_post">
                    <h2>{{ $application->name }}</h2>
                </div>
                <div class="info_about_post">
                    <div class="content_post">
                        <p>Тема:
                            <a class="link_post" title="интернет">{{ $application->theme }}</a>
                        </p>
                    </div>
                    <div class="content_post">
                        <p>
                            Опубликовал: {{ $application->author_post }}, {{date('j-m-Y', strtotime($application->created_at)) }}
                        </p>
                    </div>
                    <div class="content_post">
                        <p>
                            Разработчик: {{ $application->author_application }}
                        </p>
                    </div>
                </div>
                <div class="image_post">
                    <img class="img-thumbnail" src="../../../public/img/blogs/blog_1.jpg" />
                </div>
                <div class="content_post">
                    <p class="text-justify">
                        {{ $application->description }}
                    </p>
                </div>
                <div class="content_post">
                    <p class="text-justify">
                        Скачать и просмотреть подробную информацию о приложении можно тут: <a href="{{ $application->link }}">{{ $application->view_link }}</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div id="block_edit_post">

                <div class="well well-sm">

                    <dl class="dl-horizontal">
                        <dt>Создано:</dt>
                        <dd>{{ date('j F Y H:i', strtotime($application->created_at)) }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Обновлено:</dt>
                        <dd>{{ date('j F Y H:i', strtotime($application->updated_at)) }}</dd>
                    </dl>

                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('applications.edit', 'Редактировать', array($application->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">

                            {!! Form::open(['route' => ['applications.destroy', $application->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Удалить', ['class' => 'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            {{ Html::linkRoute('applications.index', '<< Все приложения', [], ['class' => 'btn btn-default btn-block']) }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection