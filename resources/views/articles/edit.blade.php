@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="">Body</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$article->body}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" id="" class="form-control">
                   
                    @foreach ($categories as $category)
                    @if ($category['id'] == $article->category_id)
                    <option value="{{$category['id'] }}" selected>
                        {{ $category['name'] }}
                    </option>
                    @endif
                        <option value="{{$category['id'] }}">
                            {{ $category['name'] }}
                        </option>

                    @endforeach
                </select>
            </div>
            <input type="submit" value="Update Article" class="btn btn-primary">
        </form>
    </div>
@endsection