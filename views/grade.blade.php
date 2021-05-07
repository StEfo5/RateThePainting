@extends('layouts.app')

@section('title') Grade @endsection

@section('content') 
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{$painting->name}}
				</div>
				<div class="panel-body text-center">
					<div class="row">
						<img class="col-md-8 col-md-offset-2" src="data:{{$painting->type}};base64,{{base64_encode($painting->image)}}">
					</div>
					<p>{{$painting->description}}</p>
					<b>Цена автора: {{$painting->authorPrice}}</b><br>
					<b>Цена пользователей: {{$painting->userPrice}}</b><br><br>
					<form action="/grade/decision" method="post">
						{{ csrf_field() }}
						<input type="text" name="authorId" id="authorId" value="{{$painting->authorId}}" class="hidden">
						<input type="text" name="id" id="id" value="{{$painting->id}}" class="hidden">
						<button class="btn btn-danger" name="less" id="less" value="less">Меньше</button>
						<button class="btn btn-success" name="equally" id="equally" value="equally">Равно</button>
						<button class="btn btn-warning" name="more" id="more" value="more">Больше</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection