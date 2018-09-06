@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h1>Create Post</h1>
         </div>
     <div class="card-body">
    <form action="/home/build/{{Auth::user()->id}}" method="POST">  
        {{ csrf_field()}}
        <div class="form-group">
            <h3>Title<h3>
            <input type="text" class="form-control" name="title" placeholder="Title"/>
        </div></br>
        <div class="form-group">
            <h3>Description</h3>
            <textarea type="text" class="form-control" placeholder="Description" name="body"></textarea>
        </div></br>
        <div class="form-group">
            <button class="btn btn-danger">Post Blog</button>
        </div>
    </form>
    </div>
    </div>
</div>
@endsection