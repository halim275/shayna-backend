@extends('layouts.default')

@section('content')
<div class="animated fadeIn">
	<div class="card">
		<div class="card-header">
			<strong>Tambah Foto Barang</strong>
		</div>
		<div class="card-body card-block">
			<form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="products_id">Nama Barang</label>
					<select name="products_id" id="products_id"
						class="form-control @error('products_id') is-invalid @enderror" required>
						@foreach ($products as $product)
						<option value="{{ $product->id }}">{{ $product->name }}</option>
						@endforeach
					</select>
					@error('products_id')
					<div class="text-muted">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="photo">Foto Barang</label>
					<input type="file" name="photo" id="photo"
						class="form-control-file @error('photo') is-invalid @enderror" accept="image/*" required />
					@error('photo')
					<div class="text-muted">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="is_default">Jadikan Default</label>
					<br>
					<label>
						<input type="radio" name="is_default" value="1"
							class="form-control-label @error('is_default') is-invalid @enderror" /> Ya
					</label>
					&nbsp;
					<label>
						<input type="radio" name="is_default" value="0"
							class="form-control-label @error('is_default') is-invalid @enderror" /> Tidak
					</label>

					@error('is_default')
					<div class="text-muted">{{ $message }}</div>
					@enderror
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Tambah Foto Barang</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
