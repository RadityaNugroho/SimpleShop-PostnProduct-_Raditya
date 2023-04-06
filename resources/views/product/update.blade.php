@extends('layouts.app')

@section('title', 'Product Index Page')

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
@endsection

@section('content')
    <h5 class="mb-4">Edit Product</h5>
    <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}">
        </div>
        <div class="mb-3">
            <label for="stocks" class="form-label">Stock</label>
            <input type="number" name="stocks" class="form-control" id="stocks" value="{{ $product->stocks }}">
        </div>
<div class="mb-3">
    <label for="photo"> Upload Gambar</label>
    <input type="file" name ="photo" class="form-control" id="photo">
</div>
@if($product ->photo != null)
<div style="width: 200px">
<img src="{{ asset('storage/' .$product->photo)}}" class="img-fluid" alt="...">
</div>
@else
<p class="text-info"> tidak ada foto</p>
@endif
        <div class="d-flex">
            <button type="submit" class="btn btn-primary me-3">Simpan</button>
            <a href="{{ route('product.index') }}" type="button" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#exampleTable').DataTable();
        });
    </script>
@endsection
