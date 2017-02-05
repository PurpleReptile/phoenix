@extends('main')

@section('title', '| Создать новый пост')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<div id='block_create_post'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-8 col-md-offset-2'>

                <h1>Создать новый пост</h1>
                <hr>

                {!! Form::open(['route' => 'posts.store', 'data-parsley-validate']) !!}

                {{ Form::label('title', 'Заголовок:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '160')) }}

                {{ Form::label('body', 'Содержимое:') }}
                {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

                {{ Form::submit('Создать пост', array('class' => 'btn btn_general btn-block')) }} 

                {!! Form::close() !!}

            </div> 
        </div>
    </div>
    
</div>

@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection