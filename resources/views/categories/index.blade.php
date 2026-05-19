<!-- Menggunakan file layout utama kita yang bernama 'main' -->
@extends('layouts.main')
<!-- Blok konten di bawah ini yang akan masuk ke dalam tag
@yield('content') -->
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Kategori</h2>
        <!-- Link arah ke Route Create -->
        <a href="{{ route('categories.create') }}" class="btn btnprimary"> + Tambah Kategori </a>
    </div>
    <!-- Pengecekkan dan pencetakan pesan sukses flash-session -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</ div>
    @endif
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Kita loop data hasil tarikan Eloquent ORM -->
                <!-- $index untuk mendapat nomor urutan asli bawaan
    foreach -->
                @foreach ($categories as $index => $cat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <!-- Kolom tombol interaksi -->
                                    <td>
                                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <!-- Form khusus hapus untuk melindungi dari pencurian klik GET -->
                                        <form action="{{ route('categories.destroy',$cat->id ) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus Kategori ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                @endforeach
            </tbody>
        </table>
@endsection