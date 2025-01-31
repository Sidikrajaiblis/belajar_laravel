@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Customer</div>

                <div class="card-body">
                <form action="{{ route('customer.update', $customer->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name customer</label>
                        <input type="text" class="form-control" name="name_customer"  value="{{ $customer->name_customer }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Gender</label> <br>
                        <input type="radio" class="form-check-input" name="gender" value="Man" disabled {{ $customer->gender == 'Man' ? 'checked' : '' }} >Man
                        <input type="radio" class="form-check-input" name="gender" value="Women" disabled {{ $customer->gender == 'Women' ? 'checked' : '' }} >Women
                    </div>
                    <div class="form-group">
                        <label>contact</label>
                        <input type="text" class="form-control" name="contact"  value="{{ $customer->contact }}" disabled>
                    </div>
                        <div class="form-group">
                        <a href="{{ route('customer.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
