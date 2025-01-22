@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data ppdb</div>

                <div class="card-body">
                <form action="{{ route('ppdb.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki">Laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan">Perempuan
                    </div><br>
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" name="agama">
                            <option header>Pilih Agama</option>
                            <option value="islam">islam</option>
                            <option value="kristen">kristen</option>  
                            <option value="katholik">katholik</option>
                            <option value="budha">budha</option>
                            <option value="hindu">hindu</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="textarea" class="form-control" name="alamat">
                    </div>
                    <div class="form-group">
                        <label>telpon</label>
                        <input type="number" class="form-control" name="telpon">
                    </div>
                    <div class="form-group">
                        <label>Asal Sekolah</label>
                        <input type="text" class="form-control" name="asal_sekolah">
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
