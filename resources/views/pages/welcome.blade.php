@extends('main')

@section('title', '| Главная')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Название сайта</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p> 
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Блог</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4">
            <h3>Обсуждения</h3>        
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4">
            <h3>Приложения</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
    </div>
</div>
@endsection

