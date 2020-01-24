@extends('layouts.app')

@section('content')
    <button type="button" class="btn btn-default">
        <a href="/posts" class="btn btn-outline-secondary">Go Back</a>
    </button>
    <h1>{{$post->title}}</h1>

    <div>
        {{$post->body}}
    </div>

    <hr>
    <small>Written on {{$post->created_at}} </small>

@endsection