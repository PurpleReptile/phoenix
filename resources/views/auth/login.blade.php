@extends('main')

@section('content')
<div class="container">
    <div class="page-header">
        <h2>Вход</h2>
    </div>

    <div class="col-md-7 col-md-offset-2">

        {!! Form::open(['class' => 'form-horizontal']) !!}

        <div class="form-group">
            {{ Form::label('email', 'E-mail', ['class' => 'control-label col-md-4']) }}
            <div class="col-md-8">
                {{ Form::email('email', null, ['class' => 'form-control form_control', 'placeholder' => 'Введите e-mail', 'autofocus']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Пароль', ['class' => 'control-label col-md-4']) }}
            <div class="col-md-8">
                {{ Form::password('password', ['class' => 'form-control form_control', 'placeholder' => 'Введите пароль']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
              <div class="checkbox">
                    <label>
                        {{ Form::checkbox('remember_me') }}
                        Запомнить меня
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-md-4">
                {{ Form::submit('Вход', ['class' => 'btn btn-block btn_general']) }}
            </div>
        </div>
        {!! Form::close() !!}

    </div>

</div>

@endsection
