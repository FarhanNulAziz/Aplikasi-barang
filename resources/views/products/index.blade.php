@extends('layouts.main')

@section('content')
<h1 style="text-align: center;">Daftar Barang Inventaris</h1>

<a href="/insert" class="btn btn-success mb-3 rounded-0">Tambah Data</a>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th style="width: 5%">No</th>
            <th style="width: 15%">Nama Barang</th>
            <th style="width: 12%">Kategori</th>
            <th style="width: 12%">Harga</th>
            <th style="width: 8%">Stok</th>
            <th style="width: 35%">Deskripsi</th>
            <th style="width: 13%">Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $index => $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category->name }}</td>
            <td>Rp {{ number_format($p->price) }}</td>
            <td>{{ $p->stock }}</td>
            <td>
                <span title="{{ $p->description }}"
                      style="display: -webkit-box; -webkit-line-clamp: 2;
                             -webkit-box-orient: vertical; overflow: hidden;">
                    {{ $p->description ?? '-' }}
                </span>
            </td>
            <td class="text-center">
                @if ($p->status == 'tersedia')
                    <span class="badge bg-success rounded-0">Tersedia</span>
                @else
                    <span class="badge bg-danger rounded-0">Habis</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}
@endsection