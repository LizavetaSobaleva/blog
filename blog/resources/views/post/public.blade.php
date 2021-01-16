@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Public posts</h3>

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
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
    </div>
@endsection