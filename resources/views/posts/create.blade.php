@extends('main')

@section('title', '| Создать новый пост')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });    
    </script>
@endsection

@section('content')

<div id='block_create_post'>

    <div class='container'>
        <div class='row'>
            <div class='col-md-8 col-md-offset-2'>

                <h1>Создать новый пост</h1>
                <hr>
            
                {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}

                {{ Form::label('title', 'Заголовок:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '160')) }}

                {{ Form::label('slug', 'Slug:') }}
                {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

                {{ Form::label('category_id', 'Категории') }}
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('tags', 'Тэги') }}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                
                {{ Form::label('featured_image', 'Загрузить изображение') }}
                {{ Form::file('featured_image') }}

                {{ Form::label('body', 'Содержимое:') }}
                {{ Form::textarea('body', null, array('class' => 'form-control', 'minlength' => '50')) }}

                {{ Form::submit('Создать пост', array('class' => 'btn btn_general btn-block')) }}

                {!! Form::close() !!}

            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $(".select2-multi").select2();
    </script>
@endsection