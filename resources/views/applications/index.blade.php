@extends('main')

@section('title', '| Приложения')

@section('content')

<div class='container'>

    <div class="row" id="top_panel_show_posts">
        <div class='col-md-10'>
            <h1>Все приложения</h1>
        </div>

        <div class='col-md-2'>
            <a href='{{ route('applications.create') }}' class='btn btn_general btn-block'>Создать запись</a>
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
                    <th>Название</th>
                    <th>Разработчик</th>
                    <th>Описание</th>
                    <th>Ссылка</th>
                    <th>Дата создания записи</th>
                    <th>Дата обновления записи</th>
                    <th></th>
                </thead>

                <tbody>

                    @foreach($applications as $application)

                    <tr>
                        <td> {{ $application->id}} </td>
                        <td> {{ $application->name}} </td>
                        <td> {{ $application->author_application}} </td>
                        <td> {{ substr($application->description, 0, 50)}}{{ strlen($application->description) > 50 ? "..." : "" }} </td>
                        <td> <a href="{{ $application->link }}">{{ $application->view_link }}</a> </td>
                        <td> {{ date('j F Y', strtotime($application->created_at)) }} </td>
                        <td> {{ date('j F Y', strtotime($application->updated_at)) }} </td>
                        <td>
                            <a href="{{ route('applications.show', $application->id) }}" class="btn btn_general btn-sm">Показать</a>
                            <a href="{{ route('applications.edit', $application->id) }}" class="btn btn_general btn-sm">Редактировать</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="text-center">
                {!! $applications->links(); !!}
            </div>

        </div>

        </div>
    </div>

</div>

@endsection