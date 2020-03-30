<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
// x tutti (utenti, admin, ospiti)
public function index()
{
  dd('prova route');
  // return view('guest.posts.index', compact('posts'));
}
}
