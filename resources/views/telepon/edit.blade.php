@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Telepon</div>

                <div class="card-body">
                <form action="{{ route('telepon.update', $telepon) }}" method="post" >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nomor</label>
                        <input type="text" class="form-control" name="nomor" value="{{ $telepon->nomor }}">
                    </div>
                    <div class="form-group">
                        <label>Id pengguna</label>
                        <select class="form-control" name="pengguna_id">
                            @foreach ($pengguna as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $telepon->pengguna_id ? 'selected' : '' }}>{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
