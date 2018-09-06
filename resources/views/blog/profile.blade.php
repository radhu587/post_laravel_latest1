@extends('layouts.app')
@section('content')
@foreach($take as $bb)
<div class="container">
    <div class="card mt-5">
        <div class="card-header bg-dark text-white">
            <h1>{{ $bb->user->name}}</h1>
        </div>
        <div class="card-body">
            <h4>{{ $bb->title}}</h4><hr></br>
            <h4>{{$bb->body}}</h4>
        </div>
        <div class="card-footer bg-white">
            <a href="/home/edit/{{$bb->id}}"><button class="btn btn-dark text-white">EditPost</button></a>
            <a href="/home/delete/{{$bb->id}}"><button class="btn btn-dark text-white float-right">Delete Post</button></a>
        </div>   
    </div>
</div>
@endforeach
@endsection