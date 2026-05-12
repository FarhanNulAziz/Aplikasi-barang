@extends('layouts.main')

@section('content')

<div class="container py-4" style="max-width: 700px;">

    <h4 class="mb-4">Edit Produk</h4>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf

        <!-- Nama -->
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control"
                value="{{ $product->name }}" required>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Harga & Stok -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="price" class="form-control"
                    value="{{ $product->price }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stock" class="form-control"
                    value="{{ $product->stock }}" required>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="tersedia" {{ $product->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="habis" {{ $product->status == 'habis' ? 'selected' : '' }}>Habis</option>
            </select>
        </div>

        <!-- Button -->
        <div class="d-flex justify-content-between">
            <a href="/products" class="btn btn-outline-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>

</div>

@endsection