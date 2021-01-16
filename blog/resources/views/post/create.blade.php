@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Add new post</h3>

        <div class="card mb-3">
            <div class="card-body">

                <form
                    action="{{action('PostController@store')}}"
                    method="post">

                    {{csrf_field()}}

                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>What do you want to tell?</label>
                        <input type="text" style="height: 70px;" name="text" class="form-control">
                    </div>

                    <div class="form-check mb-4">
                        <input
                        type="checkbox"
                        class="form-check-input"
                        id="public"
                        name="public"
                        value="public">

                        <label class="form-check-label" for="public">public</label>

                    </div>

                    <div class="form-group">
                        <button class="btn btn-secondary">Add post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection