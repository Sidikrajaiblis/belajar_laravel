@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Data Pembeli</div>

                <div class="card-body">
                <form action="{{ route('pembeli.update', $pembeli->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $pembeli->nama_pembeli }}" name="nama_pembeli" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamina</label>
                        <input type="text" class="form-control" value="{{ $pembeli->jenis_kelamin }}" name="jenis_kelamin" disabled>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" value="{{ $pembeli->telepon }}" name="telepon" disabled>
                    </div>
                        <div class="form-group">
                        <a href="{{ route('pembeli.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
