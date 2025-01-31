@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Order</div>

                <div class="card-body">
                <form action="{{ route('order.update', $order->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name product</label>
                        <select class="form-control" name="id_product">
                            @foreach ($product as $data)
                            <option value="{{ $data->id }}" disabled {{ $data->id == $order->id_product ? 'selected' : '' }}>{{ $data->name_product }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>quantity</label>
                        <input type="text" class="form-control" name="quantity" value="{{ $order->quantity }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>order_date</label>
                        <input type="date" class="form-control" name="order_date" value="{{ $order->order_date }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Name Customer</label>
                        <select class="form-control" name="id_customer">
                            @foreach ($customer as $data)
                            <option value="{{ $data->id }}" disabled {{ $data->id == $order->id_customer ? 'selected' : '' }}>{{ $data->name_customer }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <a href="{{ route('order.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
