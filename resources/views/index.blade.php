@extends('master')
@section('title', 'Halaman Utama Portal - Kabar Burung')
@section('body')
<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
    <h1>Portal - Kabar Burung</h1>
    <a href="{{ route('post.create') }}" class="btn btn-success">+ Tambah Post</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Published</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php $no=0 ?>

        @foreach ($posts as $post)

        <?php $no++ ?>

        <tr>
            <td>{{ $no }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->published }}</td>
            <td>{{ $post->created_at->format('M d, Y') }}</td>
            <td>
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline" 
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop