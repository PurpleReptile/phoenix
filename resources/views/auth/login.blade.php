@extends('main')

@section('content')
<div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1" id="block_top_registration">
                <h2>Вход</h2>
                <hr>
            </div>
        </div>

        <div class="col-md-7 col-md-offset-2">

            {!! Form::open(['class' => 'form-horizontal']) !!}

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
                <div class="col-md-offset-4 col-md-4">
                    {{ Form::submit('Вход', ['class' => 'btn btn_general btn-block']) }}
                </div>
            </div>
            {!! Form::close() !!}

        </div>

</div>
@endsection
