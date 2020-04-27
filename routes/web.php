<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// pages routes
Route::get('/', 'postsController@showPosts');
Route::get('/addcategory', 'postsController@showCats');
Route::get('/allposts', 'postsController@allPosts');
Route::get('/aboutme', 'PagesController@admininfo');

Route::get('/statistics', 'PagesController@statistics');
Route::get('/posts/{post}', 'postsController@viewPost');
Route::post('/posts/store', 'postsController@postNew');

Route::post('/categoies/store', 'postsController@catNew');
Route::post('/posts/{post}/store', 'commentsController@commentNew');
Route::get('allPosts/{post}/delete', 'postsController@delete');

Route::get('allPosts/{post}/edit', 'postsController@edit');
Route::post('allPosts/{post}/update', 'postsController@update');
// user area routes
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'sessionController@create');

Route::post('/login', 'sessionController@store');
Route::get('/logout', 'sessionController@destroy');
Route::get('/admin', [
  'uses' => 'PagesController@admin',
  'as'   => 'content.admin',
  'middleware' => 'roles',
  'roles' => ['admin']
]);
Route::post('/addrole', [
  'uses' => 'PagesController@addRole',
  'as'   => 'content.admin',
  'middleware' => 'roles',
  'roles' => ['admin']
]);
Route::post('/settings', [
  'uses' => 'PagesController@settings',
  'as'   => 'content.admin',
  'middleware' => 'roles',
  'roles' => ['admin']
]);
