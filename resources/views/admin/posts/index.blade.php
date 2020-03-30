@extends('layouts.app');
@section('content')
  {{-- @if (session('id_delete'))
  <div class="alert alert-success">
      Hai cancellato il post con id: {{ session('id_delete') }}
  </div>
  @endif --}}
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>User ID</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->user_id}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td><a class="btn btn-primary" href="{{route('admin.posts.show', $post->slug)}}">View</a></td>
            <td><a class="btn btn-success" href="{{route('admin.posts.edit', $post->id)}}">Edit</a> </td>
            <td>
              <form action="{{route('admin.posts.destroy',
                $post)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
        </tr>
        @endforeach

    </tbody>

</table>

@endsection
