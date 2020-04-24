<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class RegistrationController extends Controller
{
    //
    public function come() {
      return view('content.posts');
    }
    public function create() {
      return view('register.signup');
    }
    public function store(Request $request) {
      $this->validate(request(), [
        'name' => 'required|min:5',
        'email'  => 'required',
        'password'   => 'required|min:5'
      ]);
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);

      $user->save();
      $user->roles()->attach(Role::where('name', 'user')->first());
      auth()->login($user);
      return redirect('/');
    }

}
