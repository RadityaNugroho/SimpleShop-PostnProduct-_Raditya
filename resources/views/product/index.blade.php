@extends('layouts.app')

@section('title', 'Product Index Page')

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
@endsection

@section('content')
    @auth
        <div class="d-flex mb-4">
            <a href="{{ route('product.create') }}" type="button" class="ms-auto btn btn-primary">
                Tambah
            </a>
        </div>
    @endauth

    <table id="exampleTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stocks</th>
                <th>Action</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stocks }}</td>
                    <td> 
                        @if ($item->photo != null)
                        <div style="width:200px">
                        <img src="{{ asset('storage/' . $item->photo)
                        
                        }}" class="img-fluid" alt="...">
                        
                        </div>
                        @else
                        <p class="text-info">tidak ada foto</p>
                        @endif
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('product.edit', $item->id) }}" type="button" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('product.destroy', $item->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger me-3">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#exampleTable').DataTable();
        });
    </script>
@endsection
