@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Genre</div>

                <div class="card-body">
                <form action="{{ route('genre.update', $genre->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama genre</label>
                        <input type="text" class="form-control" value="{{ $genre->nama_genre }}" name="nama_genre" disabled>
                    </div>
                        <div class="form-group">
                        <a href="{{ route('genre.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
