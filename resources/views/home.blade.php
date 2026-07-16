@extends('master')
@section('title', 'Home')
@section('body')
<div class="col-md-8 offset-md-2 mt-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4 text-center">
            <i class="bi bi-person-circle text-primary" style="font-size: 4rem;"></i>
            
            <h2 class="mt-3 fw-bold">Selamat datang, {{ Auth::user()->name }}!</h2>
            <p class="text-muted mb-4">Email aktif: {{ Auth::user()->email }}</p>
            
            <hr class="my-4">

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="{{ route('post.index') }}" class="btn btn-primary btn-lg px-4 me-md-2">
                    <i class="bi bi-newspaper"></i> Masuk Ke Portal Berita
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-lg px-4">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop