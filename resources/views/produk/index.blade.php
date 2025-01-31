@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Data Produk</h4></div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif
                <a href="{{ route('produk.create') }}" class="btn btn-primary">Add</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">nama_produk</th>
                                <th scope="col">harga</th>
                                <th scope="col">stok</th>
                                <th scope="col">id kategori</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($produk as $data)
                            <tr>
                                <td scope="row">{{ $data->id }}</td>
                                <td>{{ $data->nama_produk }}</td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->stok }}</td>
                                <td>{{ $data->kategori->nama_kategori }}</td>
                                <td>
                                    <a href="{{ route('produk.edit', $data->id)}}" class="btn btn-success">Edit</a> 
                                    <a href="{{ route('produk.show', $data->id)}}" class="btn btn-warning">show</a> 
                                    <form action="{{ route('produk.destroy', $data->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection