<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use DB;
class PagesController extends Controller
{

    //
    public function admin() {
      $id = auth()->user()->id;
      $users = User::all();
      if($id === 1) {
        return view('content.admin', compact('users'));
      }else{
        return redirect('/');
      }
    }
    public function admininfo() {
      $user = User::where('name', 'samar')->first();
      $un =$user->name;
      $ui =$user->info;
      return view('content.aboutme', compact('user'));
    }

    public function spesificUser() {
      $user = User::all();
      return view('content.posts', compact('user'));
    }
    public function addRole(Request $request){

      $user = User::where('email', $request['email'])->first();
      $user->roles()->detach();
      if($request['role_user']){
        $user->roles()->attach(Role::where('name', 'user')->first());
      }
      if($request['role_editor']){
        $user->roles()->attach(Role::where('name', 'editor')->first());
      }
      if($request['role_admin']){
        $user->roles()->attach(Role::where('name', 'admin')->first());
      }
      return redirect()->back();
    }
    public function editor() {
      return view('content.editor');
    }
    public function statistics() {
      $user = User::find('id');
      $id = auth()->user()->id;
      if($id === 1) {
        $users    = DB::table('users')->count();
        $posts    = DB::table('posts')->count();
        $comments = DB::table('comments')->count();
        $cats = DB::table('categories')->count();
        return view('content.statistics', compact('users', 'posts', 'comments', 'cats'));
      }else{
        return redirect('/');
      }
    }

}
