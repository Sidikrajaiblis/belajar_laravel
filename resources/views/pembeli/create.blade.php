@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Pembeli</div>

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
                <form action="{{ route('pembeli.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama pembeli</label>
                        <input type="text" class="form-control" name="nama_pembeli" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki">Laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan">Perempuan
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="tel" class="form-control" name="telepon" required>
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
