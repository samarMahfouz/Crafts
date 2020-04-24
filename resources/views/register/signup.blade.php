@extends('master')
@section('content')
<div class="register">
  <div class="container">
    <h1 class="text-center">create account</h1>
    @foreach($errors->all() as $error)
      <p class="text-center" ><span class="btn btn-danger"> {{ $error }}</span> </p>
      @endforeach
    <form class="signup" action="/register" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="email">email</label>
        <input class="form-control  pull-right"
              id="email"
               type="email"
               name="email"
               placeholder="write your email"
               required="required"/>
      </div>
      <div class="form-group">
        <label for="name">username</label>
        <input class="form-control  pull-right"
               type="text"
               id="name"
               name="name"
               placeholder="write your username"
               required="required"/>
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="password"
                id="password"
               name="password"
               class="form-control  pull-right"
               placeholder="write your password"
               required="required"/>
       </div>
       <div class="form-group">
         <input type="submit"
                class="btn btn-primary"
                value="sign up"/>
        </div>
      </form>
  </div>
</div>
@stop
