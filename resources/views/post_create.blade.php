@extends('master')
@section('title', 'Tambah Data Post')
@section('body')
<div class="card mt-4">
    <div class="card-header">
        <h3 class="text-center">Tambah Data Post</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4">{{ old('content') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Published:</label>
                <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="publishedYes" name="published" value="yes">
                <label class="form-check-label" for="publishedYes">Yes</label>
                </div>

                <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="publishedNo" name="published" value="no">
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