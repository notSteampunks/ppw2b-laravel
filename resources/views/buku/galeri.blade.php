@extends('layout.master')

@section('content')
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h2>Buku : {{ $bukus->judul }}</h2>
        <hr>
        <div class="row justify-content-center">
            @foreach ($galeris as $data)
            <div class="col-md-4">
                <a href="{{ asset('images/'.$data->foto) }}" data-lightbox="image-1"
                    data-title="{{ $data->keterangan }}">
                    <img src="{{ asset('images/'.$data->foto) }}" style="width:200px; height:150px;"></a>
                <p>
                    <h5>{{ $data->nama_galeri }}</h5>
                </p>
            </div>
            @endforeach
            <div>{{ $galeris->links() }}</div>
        </div>
</section>
<div class="card my-4">
    <h5 class="card-header">Tinggalkan Komentar</h5>
    <div class="card-body">
        <form method="post" action="{{ route('buku.komentar', $bukus->id) }}">
            @csrf
            <div class="coment-bottom bg-white p-2 px-4">
                <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                    <input type="text" class="form-control mr-3" placeholder="Tambahkan Komentar" name="comment">
                    <input class="btn btn-primary" type="submit"></input>
                </div>
            </div>
        </form>
        @if (count($post) != 0)
        @foreach ($post as $komen)
        <div class="card py-3 px-3 text-left mb-3" style="background-color: #242424; color:white;">
            <div class="card-title">{{ $komen->user->name }}</div>
            <div class="card-text">Komentar : {{ $komen->comment }}</div>
        </div>
        @endforeach
        @else
        <p class="text-center lead w-100 text-info">Tidak ada komentar</p>
        @endif
    </div>
</div>
@endsection