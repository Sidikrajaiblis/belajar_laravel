@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h4>Product Data</h4></div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif
                <a href="{{ route('product.create') }}" class="btn btn-primary">Add</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name Product</th>
                                <th scope="col">merk</th>
                                <th scope="col">price</th>
                                <th scope="col">stock</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($product as $data)
                            <tr>
                                <td scope="row">{{ $data->id }}</td>
                                <td>{{ $data->name_product }}</td>
                                <td>{{ $data->merk }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->stock }}</td>
                                <td>
                                <img src="{{ asset('/images/product/' . $data->cover) }}" alt="" width="100">
                            </td>
                                <td>
                                    <a href="{{ route('product.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('product.show', $data->id)}}" class="btn btn-warning">show</a>
                                    <form action="{{ route('product.destroy', $data->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
