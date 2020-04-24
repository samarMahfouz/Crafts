@extends('master')
@section('content')
<div class="register reg-posts">
  <h3>Edit post</h3>
  @foreach($errors->all() as $error)
    <p class="text-center" ><span class="btn btn-danger"> {{ $error }}</span> </p>
    @endforeach
  <form  class="signup edit-post"  method="POST" action="update" enctype="multipart/form-data">
    {{csrf_field()}}
   <div class="form-group">
     <input type="text" name="name" value="{{$post->name}}" class="form-control" placeholder="the page name">
   </div>
   <div class="form-group">
     <input type="text" name="body" value="{{$post->body}}" class="form-control" placeholder="the title">
   </div>
   <div class="form-group">
     <input type="file" name="url"  value="{{$post->url}}" class="form-control">
   </div>
   <div class="form-group">
     <select class="form-control" name="cat_id">
       <option value="0" >choose the category</option>
       @foreach($cat_name as $cat)
        <option value="{{$cat->id}}" > {{$cat->name}} </option>
        @endforeach
     </select>
   </div>
     <button type="submit" class="btn btn-info">Save</button>
  </form>
</div>
@stop
