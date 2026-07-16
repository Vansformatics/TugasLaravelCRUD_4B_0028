@extends('master')
@section('title', 'Edit Data Post')
@section('body')

<div class="card mt-4">
    <div class="card-header">
        <h3 class="text-center">Edit Data Post</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Published:</label>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="publishedYes" name="published" value="yes"
                    {{ $post->published == 'yes' ? 'checked' : '' }}>
                    <label class="form-check-label" for="publishedYes">Yes</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="publishedNo" name="published" value="no"
                    {{ $post->published == 'no' ? 'checked' : '' }}>
                    <label class="form-check-label" for="publishedNo">No</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('post.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>
@stop