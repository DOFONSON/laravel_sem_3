@extends('layout')
@section('content')
@use('App\Models\User', 'User')
@use('App\Models\Article', 'Article')
@if(session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Author</th>
      <th scope="col">Accept/Reject</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $comment)
    <tr>
      <th scope="row">{{$comment->created_at}}</th>
      <td><a href="/article/{{ $comment->article_id }}">{{Article::findOrFail($comment->article_id)->name}}</a></td>
      <td>{{$comment->desc}}</td>
      <td>{{ User::findOrFail($comment->user_id)->name }}</td>
      <td class='text-center'><a href="" class='btn btn-success'>Accept</a><a href="" class='btn btn-warning'>Reject</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $articles->links() }}
@endsection