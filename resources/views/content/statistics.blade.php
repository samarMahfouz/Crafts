@extends('master')
@section('content')
<h1 class="text-center">statistics page</h1>
<section class="statistics">
  <table class="table table-hover">
    <tr>
      <td  class="pempe">all users</td>
      <td>{{$users}}</td>
    </tr>
    <tr>
      <td  class="pempe">all posts</td>
      <td>{{$posts}}</td>
    </tr>
    <tr>
      <td  class="pempe">all comments</td>
      <td>{{$comments}}</td>
    </tr>
    <tr>
      <td  class="pempe">all categories</td>
      <td>{{$cats}}</td>
    </tr>
  </table>
</section>

@stop
