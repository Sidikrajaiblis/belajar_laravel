@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Ubah Data Buku</div>

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
                <form action="{{ route('buku.update', $buku->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" class="form-control" value="{{ $buku->nama_buku }}" name="nama_buku">
                    </div>
                    <div class="form-group">
                        <label>harga</label>
                        <input type="number" class="form-control" value="{{ $buku->harga }}" name="harga">
                    </div>
                    <div class="form-group">
                        <label>stok</label>
                        <input type="number" class="form-control" value="{{ $buku->stok }}" name="stok">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <img src="{{ asset('/images/buku/' . $buku->image) }}" width="100">
                        <input type="file" class="form-control" value="{{ $buku->image }}" name="image" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Penerbit</label>
                        <select class="form-control" name="id_penerbit">
                            @foreach ($penerbit as $data)
                            <option value="{{ $data->id }}"  {{ $data->id == $buku->id_penerbit ? 'selected' : '' }}>{{ $data->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terbit</label>
                        <input type="date" class="form-control" value="{{ $buku->tanggal_terbit }}" name="tanggal_terbit">
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select class="form-control" name="id_genre">
                            @foreach ($genre as $data)
                            <option value="{{ $data->id }}"  {{ $data->id == $buku->id_genre ? 'selected' : '' }}>{{ $data->nama_genre }}</option>
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
