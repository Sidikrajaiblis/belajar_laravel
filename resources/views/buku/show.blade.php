@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Data Buku</div>

                <div class="card-body">
                <form action="{{ route('buku.show', $buku->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" class="form-control" value="{{ $buku->nama_buku }}" name="nama_buku" disabled>
                    </div>
                    <div class="form-group">
                        <label>harga</label>
                        <input type="number" class="form-control" value="{{ $buku->harga }}" name="harga" disabled>
                    </div>
                    <div class="form-group">
                        <label>stok</label>
                        <input type="number" class="form-control" value="{{ $buku->stok }}" name="stok" disabled>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" value="{{ $buku->image }}" name="image" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama Penerbit</label>
                        <select class="form-control" name="id_penerbit" disabled>
                            @foreach ($penerbit as $data)
                            <option value="{{ $data->id }}"  {{ $data->id == $buku->id_penerbit ? 'selected' : '' }}>{{ $data->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terbit</label>
                        <input type="date" class="form-control" value="{{ $buku->tanggal_terbit }}" name="tanggal_terbit" disabled>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select class="form-control" name="id_genre" disabled>
                            @foreach ($genre as $data)
                            <option value="{{ $data->id }}"  {{ $data->id == $buku->id_genre ? 'selected' : '' }}>{{ $data->nama_genre }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <a href="{{ route('buku.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
