<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;


// solo x gli admin
class PostController extends Controller
{
  private $validateRules;

    public function __construct()
    {

        $this->validateRules = [
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:255'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::where('user_id', Auth::id())->get();
      // dd('solo x admin');
    return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $idUser = Auth::user()->id;

      $request->validate($this->validateRules);
      $data = $request->all();

      $newPost = new Post;
      $newPost->title = $data['title'];
      $newPost->body = $data['body'];
      $newPost->user_id = $idUser;
      $newPost->slug = rand(1, 40) . '-' . Str::slug($newPost->title);

      $saved = $newPost->save();

      if(!$saved) {
            return redirect()->back();
        }

        return redirect()->route('admin.posts.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        // dd($post);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
     public function edit($slug)
     {
         $post = Post::where('slug', $slug)->first();
         return view('admin.posts.edit', compact('post'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $idUser = Auth::user()->id;
      if(empty($post)){
      abort('404');
    }

  if($post->user->id != $idUser)
    {
      abort('404');
    }

    $request->validate($this->validateRules);
    $data = $request->all();
    $post->title = $data['title'];
    $post->body = $data['body'];
    $post->slug = rand(1, 40) . '-' . Str::slug($post->title);

    $post->updated_at = Carbon::now();
    $updated = $post->update();

    if (!$updated)
    {
      return redirect()->back();
    }

    return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
    if (empty($post)) {
      abort('404');
    }
    $post->delete();

    return redirect()->route('admin.posts.index');
    // return redirect()->route('admin.posts.index')->with('id_delete',
    // $post->id);
    }
}
