<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionController extends Controller
{
    //
    public function create() {
      return view('register.login');
    }
    public function store(Request $request) {
      if( ! auth()->attempt(request(['email', 'password']))){
        return back()->withErrors([
          'massage' => 'Email or password not correct',
        ]);
      }
      return redirect('/');
    }
    public function destroy() {
      auth()->logout();
      return redirect('/');
    }

}
