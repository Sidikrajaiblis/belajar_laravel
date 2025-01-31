@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Transaksi</div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Yang bener ngisinya.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>jumlah</label>
                        <input type="number" class="form-control" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal_transaksi" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <select class="form-control" name="id_buku">
                            @foreach ($buku as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_buku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama pembeli</label>
                        <select class="form-control" name="id_pembeli">
                            @foreach ($pembeli as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_pembeli }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
