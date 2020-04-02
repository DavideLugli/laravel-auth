@extends('layouts.app');
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>User ID</th>
            <th>Created At</th>
            <th>Updated At</th>

        </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->user_id}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>

        </tr>


    </tbody>

</table>

<div class="img">
<img src="{{asset('storage/' . $post->img_path)}}" alt="">
</div>
@endsection
