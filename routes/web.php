<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
  return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
  //Bawaannya mencari berdasarkan id, jika ingin mencari berdasarkan
  //slug, maka harus ditambah :slug
  //$post = Post::find($id);

  return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/about', function () {
  return view('about', ['title' => 'About']);
});

Route::get('/authors/{user:username}', function (User $user) {
  //Bawaannya mencari berdasarkan id, jika ingin mencari berdasarkan
  //username, maka harus ditambah :username
  return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
  return view('posts', ['title' => 'Articles in Category: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
  return view('contact', ['title' => 'Contact']);
});