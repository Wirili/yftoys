@extends('home.layout')

@section('content')
    <div class="container">
        <header>{{$article->title}}</header>
        <div class="">
            {!! $article->contents !!}
        </div>
    </div>
@endsection

@section('footer')
@endsection