@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>My posts</h3>
        <a class="btn btn-secondary mb-4" href="posts/create">
            Add new post
        </a>
            @if(!empty($posts))
                @foreach($posts as $post)
                    @if(!empty($post))
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $post->title }}
                            </h5>
                            <p class="card-text">
                                {{ $post->text }}
                            </p>
                            <a class="btn btn-outline-light" href='posts/{{$post->id}}/edit'>
                                Edit
                            </a>                            
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
    </div>
@endsection