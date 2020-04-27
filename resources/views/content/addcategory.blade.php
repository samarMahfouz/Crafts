@extends('master')
@section('content')
@if(isset(Auth::user()->id) && Auth::user()->id == 1)
<div class="register reg-posts">
  <h3>Add new category</h3>
  @foreach($errors->all() as $error)
    <p class="text-center" ><span class="btn btn-danger"> {{ $error }}</span> </p>
  @endforeach
  <form  class="signup create-post"  method="POST" action="/categoies/store">
    {{csrf_field()}}
   <div class="form-group">
     <label for="catname">category's name</label>
     <input type="text" id="catname" name="name" class="form-control" placeholder="the category name">
   </div>
   <div class="form-group">
     <label for="desc">category's name</label>
     <input type="text" id="desc" name="description" class="form-control" placeholder="the category description">
   </div>
     <button type="submit" class="btn btn-info">Save category</button>
  </form>
</div>
@endif
@stop
