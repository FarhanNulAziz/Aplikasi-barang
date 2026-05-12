@extends('layouts.main')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card border rounded-3 overflow-hidden">

                <div class="card-header bg-primary text-white border-bottom px-4 py-3">
                    <h2 class="mb-0 fw-semibold">Tambah produk</h2>
                </div>

                <div class="card-body px-4 py-4">
                    <form action="/create-product" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label text-secondary">Nama produk</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Nama produk" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Pilih kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label text-secondary">Harga (Rp)</label>
                                <input type="number" name="price" class="form-control"
                                    placeholder="0" required>
                            </div>
                            <div class="col">
                                <label class="form-label text-secondary">Stok</label>
                                <input type="number" name="stock" class="form-control"
                                    placeholder="0" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3"
                                placeholder="Deskripsi singkat produk..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-secondary">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="">Pilih status</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Habis">Habis</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                            <a href="/products" class="btn btn-outline-secondary btn-sm px-3">Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm px-3">Simpan produk</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection