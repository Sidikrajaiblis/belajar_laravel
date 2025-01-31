@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Data Penerbit</div>

                <div class="card-body">
                <form action="{{ route('penerbit.update', $penerbit->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama penerbit</label>
                        <input type="text" class="form-control" value="{{ $penerbit->nama_penerbit }}" name="nama_penerbit" disabled>
                    </div>
                        <div class="form-group">
                        <a href="{{ route('penerbit.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
