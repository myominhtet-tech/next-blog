@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
    <div class="row">
    @foreach($articles as $article)
    <div class="col-md-6 col-lg-4 mb-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $article->created_at->diffForHumans() }},
            </div>
            {{--  <p class="card-text">{{ $article->body }}</p>  --}}
            <p class="card-text">{{ \Illuminate\Support\Str::words($article->body, 10,'....')  }}</p>

            <a href="{{ url("/articles/detail/$article->id") }}" class="card-link">
            View Detail &raquo;
            </a>
        </div>
      </div>
    </div>
   
    @endforeach
</div>
    {{ $articles->links() }}
    </div>
@endsection