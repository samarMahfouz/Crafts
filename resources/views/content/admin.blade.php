@extends('master')
@section('content')
<div class="posts">
  <div class="container">
   <h1 class="text-center">  welcome {{Auth::user()->name}} </h1>
  <table class="table">
    <tr>
      <th>#</th>
      <th>name</th>
      <th>email</th>
      <th>user</th>
      <th>editor</th>
      <th>admin</th>
    </tr>
    @foreach($users as $user)
    @if(Auth::user()->role == 2 || $user->id == 1 )
    <b></b>
    @else
    <tr>
    <form  method="post" action="/addrole">
      {{ csrf_field() }}
      <input type="hidden" name="email" value="{{ $user->email }}">
      <th>{{ $user->id }}</th>
      <td class="pempe">{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        <input type="checkbox" name="role_user" onChange="this.form.submit()"
           {{ $user->hasRole('user') ? 'checked' : ' ' }}>
      </td>
      <td>
        <input type="checkbox" name="role_editor" onChange="this.form.submit()"
           {{ $user->hasRole('editor') ? 'checked' : ' ' }}>
      </td>
      <td>
        <input type="checkbox" name="role_admin" onChange="this.form.submit()"
           {{ $user->hasRole('admin') ? 'checked' : ' ' }}>
      </td>
    </form>
    </tr>
    @endif
    @endforeach
  </table>
  </div>
</div>
@stop
