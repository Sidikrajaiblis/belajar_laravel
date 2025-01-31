@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Telepon</div>

                <div class="card-body">
                <form action="{{ route('telepon.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nomor</label>
                        <input type="text" class="form-control" name="nomor">
                    </div>
                    <div class="form-group">
                        <label>Id pengguna</label>
                        <select class="form-control" name="pengguna_id">
                            @foreach ($pengguna as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
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
