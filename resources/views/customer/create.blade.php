@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Customer</div>

                <div class="card-body">
                <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name customer</label>
                        <input type="text" class="form-control" name="name_customer">
                    </div>
                    <div class="form-group">
                        <label>Gender</label> <br>
                        <input type="radio" class="form-check-input" name="gender" value="Man">Man
                        <input type="radio" class="form-check-input" name="gender" value="Women">Women
                    </div>
                    <div class="form-group">
                        <label>contact</label>
                        <input type="text" class="form-control" name="contact">
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
