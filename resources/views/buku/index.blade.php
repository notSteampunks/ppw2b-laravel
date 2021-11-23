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
            Data Buku Perpustakaan Hogwarts
        </div>

</head>

<body>
    <!-- Search Box -->
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
                <th>Foto</th>
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
                <td><img src="{{ asset('images/'.$buku->foto) }}" style="width:120px; height:120px;"></td>
                <td>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">@csrf
                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-info">
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
<div>{{ $data_buku->links() }}</div>
<!-- <div><strong>Banyak Buku: {{ $banyak_buku }}</strong></div> -->

<!-- button tambah buku dan list buku -->
<p align="center"><a href="{{ route('buku.create') }}" class="btn btn-success"> Tambah Buku</a>
<a href="{{ route('buku.list') }}" class="btn btn-info"> List Buku</a></p>

<!-- jumlah dan total harga buku -->
<h6 align="center">Jumlah Buku Tersedia : {{$banyak_buku}}</h6>
<h6 align="center">Total Harga Seluruh Buku: {{ "Rp. ".number_format($jumlah_buku, 2, ',','.')}}</h6>

@endsection