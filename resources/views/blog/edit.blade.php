@extends('layouts.app')
@section('content')
    <div class="container"> 
        <div class="card mt-5">
            <div class="card-header bg-danger text-white">
                <h1>Edit Post</h1>
            </div>
            <div class="card-body">
                 <form action="/home/saveChange/{{$blog->id}}" method="POST">
                {{ csrf_field()}}
                    <div class="form-group">
                        <h3>Title</h3>
                        <input type="text" class="form-control" name="editTitle" value="{{$blog->title}}" />
                    </div>
                    <div class="form-group">
                        <h3>Description</h3>
                        <textarea class="form-control" name="editBody" type="text">{{$blog->body}}</textarea>
                    </div>
                        <button class="btn btn-danger" type="submit">Save Change</button>
                 </form>
                 <a href="/home/showMyPost/{{$blog->user_id}}"><button class="btn btn-danger float-right"  style="margin-top:-34px">cancel</button></a>
            </div>
      
       
        </div>
            
    </div>
@endsection