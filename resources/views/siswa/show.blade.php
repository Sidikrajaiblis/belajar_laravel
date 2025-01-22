@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Data Siswa</div>

                <div class="card-body">
                <form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nis</label>
                        <input type="number" class="form-control" value="{{ $siswa->nis }}" name="nis" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $siswa->nama }}" name="nama" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki" {{ $siswa->jenis_kelamin == 'laki-laki' ? 'checked' : '' }} disabled>Laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan" {{ $siswa->jenis_kelamin == 'perempuan' ? 'checked' : '' }} disabled>Perempuan
                    </div><br>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" disabled>
                            <option value="{{ $siswa->kelas }}">{{ $siswa->kelas }}</option>
                        </select>
                    </div><br>
                        <div class="form-group">
                        <a href="{{ route('siswa.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
