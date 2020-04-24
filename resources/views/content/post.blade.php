@extends('master')
@section('content')
<div class="container">
  <div class="one-design">
    <h1 class="text-center">{{$post->name}}</h1>
    <div class="row">
      <div class="col-md-9">
        @if($post->url)
        <img src="../upload/{{$post->url}}">
        @endif
        <p class="content-p">{{$post->body}}</p>
        @if(isset(Auth::user()->id) && Auth::user()->id == 1)
          <a class="m-a" href="/allPosts/{{$post->id}}/edit">  Edit ||</a>
          <a  class="m-a" href="/allPosts/{{$post->id}}/delete"> Delete </a>
        @endif
      </div>
  
    </div>
    <br><br><br>
    <h4>The Comments:</h4>

    @foreach($post->comments as $comment)
    <div class="row s-p">
        <p class="leads col-md-1 f-p">{{$comment->user->name}}</p>
        <p class="leads col-md-5">{{$comment->body}}</p>
    </div>
    @endforeach
    @if(Auth::check())
      @foreach($errors->all() as $error)
        <p  ><span class="btn btn-danger">Write a comment,  {{ $error }}</span> </p>
      @endforeach
    <form class="comment" method="POST" action="/posts/{{$post->id}}/store" >
      <h3>write your comment</h3>
      {{csrf_field()}}
      <input type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}">
     <div class="form-group">
       <input type="text" name="body" class="form-control" placeholder="the title">
     </div>
       <button type="submit" class="btn btn-primary">Enter</button>
    </form>
    @else
    <p class="leads btn btn-primary">you should login to write comment</p>
    <a href="/login">Login</a>||<a href="/register">Sign up</a>
    @endif
  </div>
  </div>
@stop
