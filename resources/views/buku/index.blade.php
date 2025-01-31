@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header"><h4>Data Buku</h4></div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif
                <a href="{{ route('buku.create') }}" class="btn btn-primary">Add</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nama buku</th>
                                <th scope="col">harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Image</th>
                                <th scope="col">Nama Penerbit</th>
                                <th scope="col">Tanggal terbit</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($buku as $data)
                            <tr>
                                <td scope="row">{{ $data->id }}</td>
                                <td>{{ $data->nama_buku }}</td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->stok }}</td>
                                <td><img src="{{ asset('/images/buku/' . $data->image) }}" alt="" width="100"></td>
                                <td>{{ $data->penerbit->nama_penerbit }}</td>
                                <td>{{ $data->tanggal_terbit }}</td>
                                <td>{{ $data->genre->nama_genre }}</td>
                                <td>
                                    <a href="{{ route('buku.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('buku.show', $data->id)}}" class="btn btn-warning">show</a>
                                    <form action="{{ route('buku.destroy', $data->id) }}" method="post" style="display:inline;">
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
