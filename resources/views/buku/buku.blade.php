@extends('layout.master')

@section('content')

<div class="container my-3">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <span class="">{{ session('success') }}</span>
        <button type="button" class="btn-close ml-auto d-block" data-bs-dismiss="alert" aria-label="Close"
            style="border:0; border-radius:4px;background-color:white;">X</button>
    </div>
    @endif

    <h1>Daftar Buku</h1>

    <div class="row mt-3">
        @foreach ($bukus as $buku)
        <div class="col-md-4">
            <div class="card">
                <a href="/detail-buku/{{ $buku->buku_seo }}">
                    <img src="{{ asset('thumb/'.$buku->foto) }}" class="card-img-top" alt="{{ $buku->judul }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title mb-3">{{ $buku->judul }}</h5>
                    <a href="/detail-buku/{{ $buku->buku_seo }}" class="btn btn-primary">
                        <i class="bi bi-eye"></i> Detail Buku </a>
                    <a href="{{ route ('like.foto', $buku->id)}}" class="btn btn-outline-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>
                        <i class="bi bi-heart"></i>Like</a>
                    <span class="badge badge-light"> {{$buku->like}} </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>{{ $bukus->links() }}</div>
</div>

@endsection