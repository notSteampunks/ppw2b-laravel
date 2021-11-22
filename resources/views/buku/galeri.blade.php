@extends('layout.master')

@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h2>Buku : {{ $bukus->judul }}</h2>
        <hr>
        <div class="row justify-content-center">
            @foreach ($galeris as $data)
            <div class="col-md-4">
                <a href="{{ asset('images/'.$data->foto) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }}">
                    <img src="{{ asset('images/'.$data->foto) }}" style="width:200px; height:150px;"></a>
                <p><h5>{{ $data->nama_galeri }}</h5></p>
            </div>
            @endforeach
            <div>{{ $galeris->links() }}</div>
        </div>
        <form method="post" action="{{ route('buku.komentar', $bukus->id) }}">
            @csrf
            <div style="position: flex;">
            <textarea name="comment" class="form-control"></textarea>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div> 
        </form>
        <div class="card">
            @foreach ($post as $komen)
            <div class="card-body">
                {{ $komen->comment }}
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="card my-4">
    <h5 class="card-header">Tinggalkan Komentar</h5>
    <div class="card-body">
        <form>
            <div class="form-group">
            <input class="form-control" type="text"></div>
            </div>
            <input type="submit" class="btn btn-primary"

        </form>
</div>

@endsection