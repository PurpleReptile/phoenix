@extends('main')

@section('title', '| Главная')

@section('content')

<div class="promo">
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Добро пожаловать!</h1>
            <p>Сайт для всех и ни для кого
                <a href="/about" class="btn btn_general" role="button" title="О сайте">О сайте</a>
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="page-header">
                <h3>Блог</h3>
            </div>
            <ul class="welcome_li">

                @foreach($posts as $post)

                <li class="invalid nav-item">
                    <a href="{{ url('blog/'.$post->slug) }}">| {{ $post->title }}</a>
                </li>

                @endforeach

            </ul>
        </div>
        <div class="col-md-4">
            <div class="page-header">
                <h3>Обсуждения</h3>
            </div>
            <ul class="welcome_li">
                <li class="invalid nav-item">
                    <a>| Мой сосед - дрель</a>
                </li>
                <li class="invalid nav-item">
                    <a>| Пигментация кожи не спасает от очередей</a>
                </li>
                <li class="invalid nav-item">
                    <a>| Бегал по стенам? - Легко!</a>
                </li>
                <li class="invalid nav-item">
                    <a>| Артроплевра</a>
                </li>
                <li class="invalid nav-item">
                    <a>| Почему Майкл Джексон не любил загорать?</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <div class="page-header">
                <h3>Приложения</h3>
            </div>
            <ul class="welcome_li">
                <li class="invalid nav-item">
                    <a>| Мой сосед - дрель</a>
                </li>
                <li class="invalid nav-item">
                    <a>| Пигментация кожи не спасает от очередей</a>
                </li>
                <li class="invalid nav-item">
                    <a>| Бегал по стенам? - Легко!</a>
                </li>
                <li class="invalid nav-item">
                    <a>| Артроплевра</a>
                </li>
                <li class="invalid nav-item">
                    <a>| Почему Майкл Джексон не любил загорать?</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

