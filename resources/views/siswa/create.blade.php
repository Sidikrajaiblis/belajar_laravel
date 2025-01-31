@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Siswa</div>

                <div class="card-body">
                <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nis</label>
                        <input type="number" class="form-control" name="nis" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label> <br>
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="laki-laki">Laki-laki
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="perempuan">Perempuan
                    </div><br>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" required>
                            <option header>Pilih Kelas</option>
                            <option value="XI RPL 1">XI RPL 1</option>
                            <option value="XI RPL 2">XI RPL 2</option>  
                            <option value="XI RPL 3">XI RPL 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cover</label>
                        <input type="file" class="form-control" name="cover" required>
                    </div><br>
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
