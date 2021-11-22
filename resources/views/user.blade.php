@extends('layout.master')

@section('content')
    <head>
        <div class="title m-b-md">
            Data User Perpustakaan Hogwarts
        </div>
    </head>
    
    <body>
        <!-- Tabel Data User Utama -->
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_user as $user)
                <tr>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->level}}</td>
                    <td>
                        <form>@csrf
                            <a href="/#" class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i> Edit </a>
                            <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">
                            <i class="fa fa-times"></i> Hapus </button>
                        </form>
                    </td>
                @endforeach
            </tbody>
        </table>
    </body>

    <!-- button tambah user -->
    <p align="center"><a href="{{ route('buku.create') }}" class="btn btn-success"> Tambah User</a></p>

    <h6 align="center">Jumlah User Aktif : {{$banyak_user}}</h6>
@endsection