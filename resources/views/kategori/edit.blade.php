@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Data Kategori</div>

                <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $kategori->nama_kategori }}" name="nama_kategori">
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
