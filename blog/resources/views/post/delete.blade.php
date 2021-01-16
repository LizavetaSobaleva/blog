@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Do you want to delete this post?</h3>

        <div class="card mb-3">
            <div class="card-body">
                @foreach($posts as $post)
                    @if($post->exists)                    
                        <form
                            action="{{ action('PostController@destroy', $post -> id) }}"
                            method="POST">
                            @method("delete")
                    @endif
                @endforeach

                        {{csrf_field()}}

                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                        <div class="form-group">
                            <button class="btn btn-secondary">Delete post</button>
                        </div>

                        </form>
            </div>
        </div>
    </div>
@endsection