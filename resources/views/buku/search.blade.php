@extends('layout.master')

@section('content')
    <head>
    @if(count($data_buku))
    <div class="alert alert-success">Ditemukan <strong>{{count($data_buku)}}</strong> data dengan kata: <strong>{{ $cari }}</strong>
    </div>

        <div class="title m-b-md">
            Data Buku Perpustakaan Hogwarts
        </div>
        
    <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    </head>
    <!-- Search Box -->
    <body>
        <form action="{{ route('buku.search') }}" method="get">@csrf
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%; display:inline; margin-top: 10px; margin-bottom: 10px; float: right;">
        </form>
        <!-- Tabel Buku Utama -->
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $buku)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $buku->id }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ number_format($buku->harga,0, ',', '.') }}</td>
                    <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                    <td style="display:flex">
                        <div>
                            <a href="{{ route('buku.edit', $buku->id)}}" class="btn btn-warning">Edit</a>
                        </div>
                        <div>
                            <form action="{{ route('buku.destroy', $buku->id)}}" method="post">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- pagination -->
            <div>{{ $data_buku->links() }}</div>
            <!-- <div><strong>Banyak Buku: {{ $banyak_buku }}</strong></div> -->

        <!-- button tambah buku -->
            <p align="center"><a href="{{ route('buku.create') }}" class="btn btn-success"> Tambah Buku</a></p>

        </div>
    </body>
    @else
        <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4><a href="/buku" class="btn btn-warning">Kembali</a></div>
    @endif
@endsection