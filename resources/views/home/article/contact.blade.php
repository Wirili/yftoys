@extends('home.layout')

@section('content')
    <div class="container">
        @if($article)
        <header>{{$article->title}}</header>
        <div class="">
            {!! $article->contents !!}
        </div>
        @endif
    </div>
@endsection

@section('footer')
@endsection