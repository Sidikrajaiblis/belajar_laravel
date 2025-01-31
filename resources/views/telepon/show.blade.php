@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Telepon</div>

                <div class="card-body">
                <form action="{{ route('telepon.show', $telepon->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>nomor</label>
                        <input type="text" class="form-control" value="{{ $telepon->nomor }}" name="nomor" disabled>
                    </div>
                    <div class="form-group">
                        <label>Id pengguna</label>
                        <select class="form-control" name="pengguna_id" disabled>
                            <option value="{{ $telepon->pengguna_id }}">{{ $telepon->pengguna_id }}</option>
                        </select>
                    </div><br>
                        <div class="form-group">
                        <a href="{{ route('telepon.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
