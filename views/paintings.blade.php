@extends('layouts.app')

@section('title') Картины @endsection

@section('content') 
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Рейтинг
				</div>
				<div class="panel-body">
					@foreach($paintings as $painting)
						<div class="row">
							<img class="col-md-2  img-rounded" src="data:{{$painting->type}};base64,{{base64_encode($painting->image)}}">
							<div class="col-md-10">
								<h4>{{$painting->name}}</h3>
								<p>{{$painting->authorName}}</p>
								<b>Цена: {{$painting->userPrice}}</b>
							</div>
						</div><br>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection