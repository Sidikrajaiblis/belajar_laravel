@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Product</div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name product</label>
                        <input type="text" class="form-control" name="name_product" value="{{ old('name_product') }}" required>
                    </div>
                    <div class="form-group">
                        <label>merk</label>
                        <input type="text" class="form-control" name="merk" value="{{ old('merk') }}" required>
                    </div>
                    <div class="form-group">
                        <label>price</label>
                        <input type="number" class="form-control" name="price" value="{{ old('price') }}" required>
                    </div>
                    <div class="form-group">
                        <label>stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ old('stock') }}" required>
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
