@extends('layout.master')

@section('content')

    <h2>Tambah Buku</h2>
    @if (count($errors) > 0 )
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <br>
    <form method="POST" action="{{ route('buku.store') }}">
        @csrf
        <div class="mb-3">
            <label for="inputJudul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        <div class="mb-3">
            <label for="inputPenulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control">
        </div>
        <div class="mb-3">
            <label for="inputHarga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control">
        </div>
        <div class="mb-3">
            <label for="inputTglTerbit" class="form-label">Tgl. Terbit</label>
            <input type="text" id="tgl_terbit" name="tgl_terbit" class="date form-control" placeholder="dd/mm/yyyy">
        </div>

        <!-- button simpan dan batal -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="/buku">Batal</a>
    </form>

@endsection