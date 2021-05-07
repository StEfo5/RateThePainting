@extends('layouts.app')

@section('title') Welcome @endsection

@section('content')
<div class="text-center" style="padding-top: 80px; background-image: url({{asset('images/bg/main.png')}}); background-size: 100%; height: 1080px;">
    <h1 class="pacifico text-white" style="font-size: 56px;">
        Rate The Painting!
    </h1>
    <div class="col-7 mx-auto">
        <h4 class="baloo text-white mt-5">
            This is a website that can help you to properly rate your art’s price. You also can view and rate other people’s arts!
        </h4>
    </div>
</div>
@endsection
