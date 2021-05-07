@extends('layouts.app')

@section('title') Upload @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Загрузка фото
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
                    <form action='/upload/intoDB' method="post" enctype="multipart/form-data">  
                        {{ csrf_field() }}
                        <input type="file" name="image" id="image" class="form-control"><br>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Название картины"><br>
                        <textarea name="description" id="description" class="form-control" placeholder="Описание"></textarea><br>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Ваша цена"><br>
                        <button class="btn btn-success">Загрузить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
