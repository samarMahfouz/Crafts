@extends('master')
@section('content')
<!-- Start about me  -->
<section class="about s-about">
  <div class="container">
    <section class="con">
      <h2>about me</h2>
      <section class="img"><img src="upload/myim.jpg" alt="my-image"/></section>
      <section class="info">
       <h3>{{$user->name}}</h3>
       
      </section>
    </section>
      <hr>
  </div>
</section>
<!-- End about me  -->
@stop
