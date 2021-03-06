@extends('layouts.default')

@section('content')
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Barang</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus />
                        @error('name')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Tipe Barang</label>
                        <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" required />
                        @error('type')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Barang</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror editor" id="description" style="resize: none; width: 100%">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Barang</label>
                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required />
                        @error('price')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="qty">Kuantitas Barang</label>
                        <input type="number" name="quantity" id="qty" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" required />
                        @error('quantity')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Tambah Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
