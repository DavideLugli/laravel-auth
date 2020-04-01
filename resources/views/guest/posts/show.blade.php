@extends('layouts.app')
@section('content')
{{-- mostriamo il post --}}
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>User ID</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->user_id}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
        </tr>
    </tbody>

</table>
{{-- commenti del post --}}
<div class="row mt-3">
    <div class="col-12">
        <h4>Commenti su <strong>{{$post->title}}</strong> </h4>
        @forelse ($post->comments as $comment)
        <div class="comment mt-5 mb-5">
            <h5>{{$comment->title}}</h5>
            <small>{{$comment->name}}</small>
            <div>
                {{$comment->body}}
            </div>
        </div>

        @empty
        <p>Ancora nessun commento</p>
        @endforelse
    </div>

</div>
{{-- x aggiungere commenti --}}
<div class="row">
    <div class="col-12">
        <form action="{{route('comments.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input class="form-control" type="text" name="title">
            </div>
            <div class="form-group">
                <label for="body">Commento</label>
                <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Il tuo Nome</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="email">La tua mail</label>
                <input class="form-control" type="text" name="email">
            </div>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <button class="btn btn-primary" type="submit">Invia</button>
        </form>
    </div>
</div>
{{-- pulsante torna alla home --}}
<div class="mt-3">
    <a class="btn btn-primary" href="{{route('posts.index')}}">Torna Alla Home</a>
</div>
@endsection
