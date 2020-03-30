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
            {{-- <th colspan="3"></th> --}}
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
            {{-- <td><a class="btn btn-primary" href="{{route('admin.posts.show', $post->slug)}}">View</a></td> --}}
            {{-- <td>Edit</td>
            <td>Delete</td> --}}
        </tr>


    </tbody>

</table>

@endsection
