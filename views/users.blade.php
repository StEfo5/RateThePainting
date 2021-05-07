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
					@foreach($users as $user)
						<div class="row">
							<img class="col-md-1 img-rounded" src="<?php if ($user->avatar==Null) echo asset("images/avatar.jfif");
								else echo 'data:'.$user->avatarType.';base64,'.base64_encode($user->avatar);
							?>">
							<div class="col-md-11">
								<h4>{{$user->name}}</h4>
								<b>Количество баллов: {{$user->numberOfPoints}}</b>
							</div>
						</div><br>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection