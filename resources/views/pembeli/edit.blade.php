@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Data Pembeli</div>

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
                <form action="{{ route('pembeli.update', $pembeli->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $pembeli->nama_pembeli }}" name="nama_pembeli" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki" {{ $pembeli->jenis_kelamin == 'laki-laki' ? 'checked' : '' }} >Laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan" {{ $pembeli->jenis_kelamin == 'perempuan' ? 'checked' : '' }} >Perempuan
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" value="{{ $pembeli->telepon }}" name="telepon" required>
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
