@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-18">
            <div class="card">
                <div class="card-header"><h4>Ppdb</h4></div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @endif  
                <a href="{{ route('ppdb.create') }}" class="btn btn-primary">Add</a>
                    <table class="table table-bordered">
                        <thead>
                            <th scope="row"></th>
                            <th scope="col">No</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Telpon</th>
                            <th scope="col">Asal Sekolah</th>
                            <th scope="col">Action</th>
                        </thead>
                        @php $no = 1; @endphp
                        @foreach($ppdb as $data)
                        <tbody>
                            <th scope="row"></th>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->nama_lengkap }}</td>
                            <td>{{ $data->jenis_kelamin}}</td>
                            <td>{{ $data->agama }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->telpon }}</td>
                            <td>{{ $data->asal_sekolah }}</td>
                            <td>
                                <a href="{{ route('ppdb.edit', $data->id)}}" class="btn btn-success"  style="display:inline;">Edit</a>
                                <a href="{{ route('ppdb.show', $data->id)}}" class="btn btn-warning" style="display:inline;">show</a>
                                <form id="delete-form-{{ $data->id }}" action="{{ route('ppdb.destroy', $data->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDeletion('{{ $data->id }}')">Delete</button>
                                    </form>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        function confirmDeletion(id) {
                                            Swal.fire({
                                                title: "Apa kau yakin??",
                                                text: "Kau tidak akan bisa mengembalikan ini!",
                                                icon: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Ya, Hapus!",
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // Submit the form
                                                    document.getElementById(`delete-form-${id}`).submit();
                                                    Swal.fire({
                                                        title: "Di Hapus!",
                                                        text: "Data telah dihapus.",
                                                        icon: "success"
                                                    });
                                                }
                                            });
                                        }
                                    </script>
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