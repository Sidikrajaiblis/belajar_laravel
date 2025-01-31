@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Data Siswa</h4></div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif
                <a href="{{ route('siswa.create') }}" class="btn btn-primary">Add</a>
                    <table class="table table-bordered">
                        <thead>
                            <th scope="row"></th>
                            <th scope="col">No</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Action</th>
                        </thead>
                        @php $no = 1; @endphp
                        @foreach($siswa as $data)
                        <tbody>
                            <th scope="row"></th>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->jenis_kelamin}}</td>
                            <td>{{ $data->kelas }}</td>
                            <td>
                                <img src="{{ asset('/images/siswa/' . $data->cover) }}" alt="" width="100">
                            </td>
                            <td>
                                <a href="{{ route('siswa.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{ route('siswa.show', $data->id)}}" class="btn btn-warning">show</a>
                                <form action="{{ route('siswa.destroy', $data->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                </form>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
