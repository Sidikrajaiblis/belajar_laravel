@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Data ppdb</div>

                <div class="card-body">
                <form action="{{ route('ppdb.update', $ppdb->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $ppdb->nama_lengkap }}" name="nama_lengkap">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki" {{ $ppdb->jenis_kelamin == 'laki-laki' ? 'checked' : '' }} >Laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan" {{ $ppdb->jenis_kelamin == 'perempuan' ? 'checked' : '' }} >Perempuan
                    </div><br>
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" name="agama">
                            <option header>Pilih Agama</option>
                            <option value="islam" {{ $ppdb->agama == 'islam' ? 'selected' : '' }}>islam</option>
                            <option value="kristen" {{ $ppdb->agama == 'kristen' ? 'selected' : '' }}>kristen</option>  
                            <option value="katholik" {{ $ppdb->agama == 'katholik' ? 'selected' : '' }}>katholik</option>
                            <option value="budha" {{ $ppdb->agama == 'budha' ? 'selected' : '' }}>budha</option>
                            <option value="hindu" {{ $ppdb->agama == 'hindu' ? 'selected' : '' }}>hindu</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="textarea" class="form-control" name="alamat" value="{{ $ppdb->alamat }}">
                    </div>
                    <div class="form-group">
                        <label>telpon</label>
                        <input type="number" class="form-control" name="telpon" value="{{ $ppdb->telpon }}">
                    </div>
                    <div class="form-group">
                        <label>Asal Sekolah</label>
                        <input type="text" class="form-control" name="asal_sekolah" value="{{ $ppdb->asal_sekolah }}">
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
