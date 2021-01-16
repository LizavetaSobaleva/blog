@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>You can edit your post here</h3>

        <div class="card mb-3">
            <div class="card-body">
                @foreach($posts as $post)
                    @if($post->exists)    
                    <!-- форма редактирования -->                
                        <form
                            action="{{ action('PostController@update', $post -> id) }}"
                            method="POST">
                            @method("PATCH")

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

                    <h5 class="card-title">
                        <label>New title</label>
                        <input type="text" name="title" class="form-control">
                    </h5>
                    <p class="card-text">
                        <label>New text</label>
                        <input type="text" style="height: 70px;" name="text" class="form-control">
                    </p>

                    <div class="form-check  mb-4">
                        <input
                        type="checkbox"
                        class="form-check-input"
                        id="public"
                        name="public"
                        value="public">

                        <label class="form-check-label" for="public">public</label>

                    </div>

                    <div class="form-group">
                        <button class="btn btn-secondary">Edit post</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection