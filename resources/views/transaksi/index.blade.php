@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header"><h4>Data transaksi</h4></div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif
                <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Add</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">jumlah</th>
                                <th scope="col">Tanggal transaksi</th>
                                <th scope="col">Nama Buku</th>
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($transaksi as $data)
                            <tr>
                                <td scope="row">{{ $data->id }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->tanggal_transaksi }}</td>
                                <td>{{ $data->buku->nama_buku }}</td>
                                <td>{{ $data->pembeli->nama_pembeli }}</td>
                                <td>
                                    <a href="{{ route('transaksi.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('transaksi.show', $data->id)}}" class="btn btn-warning">show</a>
                                    <form action="{{ route('transaksi.destroy', $data->id) }}" method="post" style="display:inline;">
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
