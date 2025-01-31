@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Product</div>

                <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name product</label>
                        <input type="text" class="form-control" name="name_product" value="{{ $product->name_product }}">
                    </div>
                    <div class="form-group">
                        <label>merk</label>
                        <input type="text" class="form-control" name="merk"  value="{{ $product->merk }}">
                    </div>
                    <div class="form-group">
                        <label>price</label>
                        <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label>stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">
                    </div>
                    <div class="form-group">
                        <label>Cover</label>
                        <img src="{{ asset('/images/product/' . $product->cover) }}" width="100">
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
