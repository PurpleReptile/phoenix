@extends('main')

@section('title', '| Все категории')

@section('content')

<div class='container'>
	<div class="row">
		<div class="col-md-8">
			<h1>Все категории</h1>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-hover">

					<thead>
						<th>#</th>
						<th>Название</th>
					</thead>

					<tbody>
					@foreach($categories as $category)

						<tr>
							<td> {{ $category->id }} </td>
							<td> {{ $category->name }} </td>
						</tr>

						@endforeach

					</tbody>
				</table>

				{{-- <div class="text-center">
					{!! $categories->links(); !!}
				</div> --}}

			</div>
		</div>

		<div class="col-md-3 col-md-offset-1">
			<div class="well well-sm">
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
					<h2>Новая категория</h2>
					{{ Form::label('name', 'Название') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('Создать новую категорию', ['class' => 'btn btn_general btn-block'])}}

				{!! Form::close() !!}

			</div>
		</div>

	</div>

</div>

@endsection