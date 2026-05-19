@extends('layouts.main')

@section('content')
    <h1 style="text-align: center;">Daftar Barang Inventaris</h1>

    <a href="/create-product" class="btn btn-primary mb-3 rounded-5">Tambah Data</a>

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
                <th style="width: 15%">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $index => $p)
                <tr>
                    <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td>Rp {{ number_format($p->price) }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>
                        <span title="{{ $p->description }}" style="display: -webkit-box; -webkit-line-clamp: 2;
                                             -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $p->description ?? '-' }}
                        </span>
                    </td>
                    <td class="text-center">
                        @if ($p->stock == '0')
                            <span class="badge bg-secondary rounded-5">Habis</span>
                        @else
                            <span class="badge bg-success rounded-5">Tersedia</span>
                        @endif
                    </td>

                    <td>
                        <div class="d-flex gap-2 justify-content-center">

                            <a href="{{ route('products.edit', $p->id) }}" class="btn btn-primary btn-sm rounded-5">
                                Edit
                            </a>

                            <form action="{{ route('products.delete', $p->id) }}" method="POST">

                                @csrf

                                <button type="submit" class="btn btn-danger btn-sm rounded-5"
                                    onclick="return confirm('Yakin ingin menghapus produk ini?')">

                                    Hapus

                                </button>

                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
@endsection