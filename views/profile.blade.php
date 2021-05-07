@extends('layouts.app')

@section('title') Grade @endsection

@section('content') 
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Данные
				</div>
				<div class="panel-body">
					@if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
					<form action='/profile/change' method="post" enctype="multipart/form-data">  
                        {{ csrf_field() }}
                        <div class="row">
                        	<img class="col-md-4 col-md-offset-4 img-rounded" src="<?php if (Auth::user()->avatar==Null) echo asset("images/avatar.jfif");
								else echo 'data:'.Auth::user()->avatarType.';base64,'.base64_encode(Auth::user()->avatar);
							?>">
                        </div><br>
                        <p>Поменять аватар:</p>
                        <input type="file" name="avatar" id="avatar" class="form-control"><br>
                        <p>Логин:</p>
                        <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}"><br>
                        <p>Email:</p>
                        <input type="text" name="email" id="email" class="form-control" value="{{Auth::user()->email}}"><br>
                        <button class="btn btn-success">Сохранить изменения</button>
                        <!-- <button class="btn btn-danger" form="">Удалить аккаунт</button> -->
                    </form>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Рейтинг
				</div>
				<div class="panel-body">
					@if($paintings==Null)
						У вас пока нет картин
					@else
						@foreach($paintings as $painting)
							<div class="row">
								<img class="col-md-2  img-rounded" src="data:{{$painting->type}};base64,{{base64_encode($painting->image)}}">
								<div class="col-md-10">
									<h4>{{$painting->name}}</h3>
									<b>Цена: {{$painting->userPrice}}</b>
								</div>
							</div><br>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection