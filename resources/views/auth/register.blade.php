@extends('main')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1" id="block_top_registration">
            <h2>Регистрация</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 col-md-offset-2">

            {!! Form::open(['class' => 'form-horizontal']) !!}

            <div class="form-group">
                {{ Form::label('name', 'Имя', ['class' => 'control-label col-md-4'])}}
                <div class="col-md-8">
                    {{ Form::text('name', null, ['class' => 'form-control form_control', 'placeholder' => 'Введите имя']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('email', 'E-mail', ['class' => 'control-label col-md-4']) }}
                <div class="col-md-8">
                    {{ Form::email('email', null, ['class' => 'form-control form_control', 'placeholder' => 'Введите e-mail']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Пароль', ['class' => 'control-label col-md-4']) }}
                <div class="col-md-8">
                    {{ Form::password('password', ['class' => 'form-control form_control', 'placeholder' => 'Введите пароль']) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('password_confirmation', 'Повторите пароль', ['class' => 'control-label col-md-4']) }}
                <div class="col-md-8">
                    {{ Form::password('password_confirmation', ['class' => 'form-control form_control', 'placeholder' => 'Введите пароль ещё раз']) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    {{ Form::submit('Регистрация', ['class' => 'btn btn_general']) }}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
