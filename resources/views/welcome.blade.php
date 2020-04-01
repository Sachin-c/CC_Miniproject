@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                <h1 class="text-center">Your Reviews results</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
              
                @foreach($posts as $post)
                @if($post->user_id == $id ) 
                    <div class="panel panel-default text-center">
                        <div class="panel-heading" style="font-size: 28px;">
                            Title :{{ $post->title }}<br>
                            Content: {{ $post->content }}
                        </div>
                        @if($post->Review=="Positive\n")
                        <div class="panel-body" style=" background-color: lightgreen;">
                            Content Review:<br> {{ $post->Review }}
                        </div>
                        @elseif($post->Review=="Negative\n")
                        <div class="panel-body" style=" background-color: #ffcccb;">
                           Content Review:<br> {{ $post->Review }}
                        </div>
                        @endif
                    </div>
                    @endif
                @endforeach
            
            </div>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
            <h1 class="text-center">Add New Reviews</h1>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <label for="title" class="control-label">
                        Review Title
                    </label>
                    <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title">
                </div>
                <div class="form-group">
                    <label for="content" class="control-label">
                        Review Content
                    </label>
                    <textarea
                            name="content"
                            id="content"
                            rows="10"
                            class="form-control"></textarea>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>
@endsection
