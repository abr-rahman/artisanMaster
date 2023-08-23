@extends('layouts.master')
@section('pageTitle')
    {{ __('Post') }}
@endsection
@section('content')
    <div class="pd-20 card-box mb-30">
        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <label class="col-sm-6 col-md-1 col-form-label">Title</label>
                <div class="col-sm-6 col-md-5">
                    <input class="form-control" type="text" value="{{ $post->title }}" name="title" placeholder="Title">
                </div>
                <label class="col-sm-6 col-md-1 col-form-label">Category</label>
                <div class="col-sm-6 col-md-5">
                    <input class="form-control" name="category" value="{{ $post->category }}" type="text" placeholder="Category">
                </div> <br> <br><br>
                <label class="col-sm-6 col-md-1 col-form-label">Description</label>
                <div class="col-sm-6 col-md-5">
                    <textarea name="description" class="form-control" cols="10" rows="5">{{ $post->description }}</textarea>
                </div>
                <label class="col-sm-6 col-md-1 col-form-label">Image</label>
                <div class="col-sm-6 col-md-5">
                    <input class="form-control" type="file" name="image" value="{{ $post->image }}"> <br> <br>
                    <button class="btn btn-sm btn-success float-end" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

