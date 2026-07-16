@extends('master')

@section('title', 'Berita - Kabar Burung')

@section('body')
<div class="container my-4">
    <div class="border-bottom pb-2 mb-4">
        <h4 class="fw-bold text-uppercase text-secondary">Berita Utama</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @auth
        <div class="mb-4">
            <a href="{{ route('post.create') }}" class="btn btn-success fw-bold">
                <i class="bi bi-plus-lg"></i> Tambah Berita Baru
            </a>
        </div>
    @endauth

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                    <img src="https://picsum.photos/seed/{{ $post->id }}/600/400" class="card-img-top" alt="Berita Image" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body d-flex flex-column">
                        <div class="mb-2">
                            <span class="badge bg-danger-subtle text-danger text-uppercase fw-bold" style="font-size: 0.75rem;">
                                {{ $post->published == 'yes' ? 'Published' : 'Draft' }}
                            </span>
                        </div>

                        <h5 class="card-title fw-bold mb-3">
                            <a href="{{ route('post.show', $post->id) }}" class="text-dark text-decoration-none hover-primary">
                                {{ $post->title }}
                            </a>
                        </h5>

                        <p class="card-text text-muted flex-grow-1" style="font-size: 0.9rem; line-height: 1.6;">
                            {{ Str::limit($post->content, 120, '...') }}
                        </p>

                        <hr class="text-muted my-3">

                        <div class="d-flex justify-content-between align-items-center text-muted" style="font-size: 0.8rem;">
                            <span>Oleh: <strong>Admin</strong></span>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>

                        @auth
                            <div class="mt-3 pt-2 border-top d-flex justify-content-end">
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm text-white me-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Belum ada berita yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@stop