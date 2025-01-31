@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Ubah Data Transaksi</div>

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
                <form action="{{ route('transaksi.show', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>jumlah</label>
                        <input type="number" class="form-control" value="{{ $transaksi->jumlah }}" name="jumlah" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" class="form-control" value="{{ $transaksi->tanggal_transaksi }}" name="tanggal_transaksi" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <select class="form-control" name="id_buku" disabled>
                            @foreach ($buku as $data)
                            <option value="{{ $data->id }}"  {{ $data->id == $transaksi->id_buku ? 'selected' : '' }}>{{ $data->nama_buku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Pembeli</label>
                        <select class="form-control" name="id_pembeli" disabled>
                            @foreach ($pembeli as $data)
                            <option value="{{ $data->id }}"  {{ $data->id == $transaksi->id_pembeli ? 'selected' : '' }}>{{ $data->nama_pembeli }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
