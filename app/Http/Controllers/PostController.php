<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
// x tutti (utenti, admin, ospiti)
public function index()
{
  $posts = Post::all();
  return view('guest.posts.index', compact('posts'));
}

public function show($slug)
{
  $post = Post::where('slug', $slug)->first();
  if(empty($post))
  {
    abort(404);
  }

  return view('guest.posts.show', compact('post'));
}

}
