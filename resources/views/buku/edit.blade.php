@extends('layout.master')

@section('content')

    <h2>Edit Buku</h2>
    @if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputJudul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{$buku->judul}}">
        </div>
        <div class="mb-3">
            <label for="inputPenulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" value="{{$buku->penulis}}">
        </div>
        <div class="mb-3">
            <label for="inputHarga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" value="{{$buku->harga}}">
        </div>
        <div class="mb-3">
            <label for="inputTglTerbit" class="form-label">Tgl. Terbit</label>
            <input type="text" name="tgl_terbit" class="date form-control" value="{{$buku->tgl_terbit}}">
        </div>
        <div class="form-group">
            <label for="foto"> Upload Foto </label>
            <input type="file" class="form-control" name="foto">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="/buku">Batal</a>
    </form>
@endsection