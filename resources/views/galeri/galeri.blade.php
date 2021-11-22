@extends('layout.master')

@section('content')
    <head>
    <!-- pesan sukses buku berhasil ditambahkan, diupdate, dan dihapus -->
    @if(Session::has('success_added'))
        <div class="alert alert-success">{{Session::get('success_added')}}</div>
    @endif
    @if(Session::has('success_updated'))
        <div class="alert alert-primary">{{Session::get('success_updated')}}</div>
    @endif
    @if(Session::has('success_deleted'))
        <div class="alert alert-danger">{{Session::get('success_deleted')}}</div>
    @endif

        <div class="title m-b-md">
            Galeri Buku Perpustakaan Hogwarts
        </div>
    </head>
    
    <body>
        <!-- Tabel Data User Utama -->
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>Nama Galeri</th>
                    <th>Nama Buku</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($galeri as $data)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $data->nama_galeri }}</td>
                    <td>{{ $data->bukus->judul }}</td>
                    <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px"></td>
                    <td>
                        <form action="{{ route('galeri.destroy', $data->id) }}" method="post">@csrf
                            <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i> Edit </a>
                            <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">
                            <i class="fa fa-times"></i> Hapus </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    <!-- pagination -->
    <div>{{ $galeri->links() }}</div>

    <!-- button tambah buku -->
    <p align="center"><a href="{{ route('galeri.create') }}" class="btn btn-success"> Tambah Galeri</a></p>

@endsection