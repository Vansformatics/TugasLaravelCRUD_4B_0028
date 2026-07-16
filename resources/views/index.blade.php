@extends('master')

@section('title', 'Halaman Utama Berita - Kabar Burung')

@section('body')
<div class="d-flex justify-content-between align-items-center my-4">
    <h1>Berita - Kabar Burung</h1>
    
    @auth
        <a href="{{ route('post.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tambah Berita Baru
        </a>
    @endauth
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<table class="table table-hover table-striped shadow-sm rounded">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Published</th>
            <th>Tanggal</th>
            <th>Aksi</th> 
        </tr>
    </thead>
    <tbody>
        @php $no = 0; @endphp
        @forelse ($posts as $post)
            @php $no++; @endphp
            <tr>
                <td>{{ $no }}</td>
                <td>
                    <a href="{{ route('post.show', $post->id) }}" class="fw-bold text-decoration-none text-dark">
                        {{ $post->title }}
                    </a>
                </td>
                <td>
                    <span class="badge {{ $post->published == 'yes' ? 'bg-success' : 'bg-secondary' }}">
                        {{ strtoupper($post->published) }}
                    </span>
                </td>
                <td>{{ $post->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-info btn-sm text-white me-1">
                        <i class="bi bi-eye"></i> Detail
                    </a>

                    @auth
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm text-white me-1">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>

                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    @endauth
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-4">Belum ada data berita.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@stop