@extends('master')
@section('content')
<!-- Start my designs -->
<section class="my-design inner-design">
  <div class="container">
    <h2>all designs</h2>
    <ul class="link">
      <li class="selected filter" data-filter="all">all</li>
      @foreach($cat_name as $result)
      <li  class="filter" data-filter=".{{ $result->name }}">{{ $result->name }}</li>
      @endforeach
    </ul>
    <section id="gallery" class="gallery">
      <div class="row">
        @foreach($posts as $post)
        <div class="col-md-3 plus">
          <div class="mix {{$post->category->name}}">
            <a href="/posts/{{$post->id}}"><h4>{{$post->name}}</h4>
            @if($post->url)
            <img src="upload/{{$post->url}}">
            @endif
            </a>
            <a class="m-a" href="/posts/{{$post->id}}">  view more </a>
            @if(isset(Auth::user()->id) && Auth::user()->id == 1)
            <a class="m-a" href="/allPosts/{{$post->id}}/edit"> || edit ||</a>
            <a  class="m-a" href="/allPosts/{{$post->id}}/delete"> delete </a>
            @endif
          </div>
        </div>
            @endforeach
      </div>
    </section>
    @if(isset(Auth::user()->id) && Auth::user()->id == 1)
    <div class="register reg-posts">
      <h3>Add new post</h3>
      @foreach($errors->all() as $error)
        <p class="text-center" ><span class="btn btn-danger"> {{ $error }}</span> </p>
      @endforeach
      <form  class="signup create-post"  method="POST" action="/posts/store" enctype="multipart/form-data">
        {{csrf_field()}}
       <div class="form-group">
         <label for="email">design's name</label>
         <input type="text" id="email" name="name" class="form-control" placeholder="the page name">
       </div>
       <div class="form-group">
         <label for="desc">the description</label>
         <input type="text" id="desc" name="body" class="form-control" placeholder="the title">
       </div>
       <div class="form-group">
         <label for="image">main image</label>
         <input type="file" id="image" name="url" class="form-control">
       </div>
       <div class="form-group">
          <select class="form-control" name="cat_id">
            <option value="0" >choose the category</option>
          @foreach($cat_name as $cat)
             <option value="{{$cat->id}}" > {{$cat->name}} </option>
          @endforeach
        </select>
        </div>
         <button type="submit" class="btn btn-info">Save design</button>
      </form>
    </div>
    @endif
  </div>
</section>
<!-- End my designs -->
@stop
