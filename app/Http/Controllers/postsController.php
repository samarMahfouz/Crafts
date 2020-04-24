<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use DB;
class postsController extends Controller
{
    public function showPosts(){
      $last = DB::table('posts')->latest()->first();
      $latestposts =  Post::orderBy('created_at', 'desc')->skip(1)->take(3)->get();
      $posts = Post::with('category')->get();
      $cat_name = Category::all();
      return view('content.posts', compact('posts', 'cat_name', 'latestposts', 'last'));
    }
    public function allPosts() {
      $users = User::all();
      $posts = Post::all();
      $cat_name = Category::all();
      return view('content.allposts', compact('posts', 'cat_name', 'users'));
    }

    public function viewPost(Post $post) {
      return view('content.post', compact('post'));
  }


    public function postNew(Request $request){
      $this->validate(request(), [
        'name' => 'required|min:5',
        'body'  => 'required',
        'url'   => 'image|mimes:jpg,jpeg,gif,png'
      ]);
      $img_name = time() . '.' . $request->url->getClientOriginalExtension();
      $post = new Post;
      $post->name = request('name');
      $post->body  = request('body');
      $post->url   =   $img_name;
      $post->cat_id = request('cat_id');
      $post->save();
      $request->url->move(public_path('upload'), $img_name);
      return redirect('/allposts');
    }
    public function edit(Post $post, Category $cat){
      $posts = Post::all();
      $cat_name = Category::all();
      return view('content.edit', compact('post', 'cat_name', 'posts'));
    }
    public function update(Request $request, Post $post){
      $post->update($request->all());
      return redirect('/allposts');
    }
    public function delete(Post $post){
      $post->delete();
      return back();
    }
}
