@extends('layouts.app')

@section('content')
<div class="container">     
  @foreach($take1 as $tt1)
    <div class="card mt-5">
        <div class="card-header bg-danger text-white">
        <p class="float-right">{{ $tt1->created_at->diffForHumans()}}</p>
         <h2> {{ $tt1->user->name}}</h2>
        </div>
        <div class="card-body">
             <h4>{{ $tt1->title}}</h4><hr></br>
             <h4>{{ $tt1->body}}<h4><hr>
             <h3>Comments</h3>
             <ul class="list-group">
             @foreach($tt1->comments as $com)
              <li class="list-group-item">
                    <h5><strong>{{$com->user_name}}</strong></h5>
                    <p  style="margin-bottom: -10px; margin-top:-5px;">{{$com->body}}</p>
              </li>
             @endforeach
             </ul>
        </div>
        <div class="card-footer">
          <form action="/home/addComment/{{$tt1->id}}" method="POST">
              {{ csrf_field()}}
              <textarea class="form-control" type="text" name="commentBody" placeholder="Enter Your Comment"></textarea><br>
              <button class="btn btn-danger" type="submit">Add Comment</button>
          </form>
        </div>
    </div>
  @endforeach 
</div>
@endsection
 