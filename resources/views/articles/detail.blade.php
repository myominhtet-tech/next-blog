@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $article->created_at->diffForHumans() }},
                Category: <b>{{ $article->category->name }}</b>
            </div>
            <p class="card-text">{{ $article->body }}</p>
            <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-warning">
            Delete
            </a>
            <a href="{{ url("/articles/edit/$article->id") }}" class="btn btn-info">
            Edit
            </a>
        </div>
    </div>
    <ul class="list-group">
        <li class="list-group-item active">
            <b>Comments ({{count($article->comments)}})</b>
        </li>
        @foreach ($article->comments as $comment)
            <li class="list-group-item">

                {{$comment->content}}
                <a href="{{ url("/comments/delete/$comment->id") }}" class="close">&times;</a>
            <div class="small mt-2">
                By <b>{{ $comment->user->name }}</b>,
                {{ $comment->created_at->diffForHumans()}}
            </div>
            </li>
        @endforeach
    </ul>
    @if (session('del-com'))
    <div class="alert alert-info">
        {{ session('del-com') }}
    </div>
    @endif
    @if (session('add-com'))
    <div class="alert alert-success">
        {{ session('add-com') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
    @endif
    @auth
    <form action="{{ url('/comments/add') }}" method="post">
        @csrf
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <textarea name="content" rows="5"  class="form-control mb-2" placeholder="New Comment"></textarea>
        <input type="submit" value="Add Comment" class="btn btn-secondary">
    </form>
    @endauth
    
    </div>
@endsection