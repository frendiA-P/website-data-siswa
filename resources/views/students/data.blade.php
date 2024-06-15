@extends('layout.main')

@section('content')
<h3>Data Student</h3>
<div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('students/add') }}'">
                <i class="fas fa-plus-circle"></i> Add New Data
            </button>
        </div>
        <div class="card-body">
        @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Students</th>
                        <th>Full Name</th>
                        <th>Genre</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>#</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $row)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $row->idstudents }}</td>
                        <td>{{ $row->fullname }}</td>
                        <td>{{ ($row->genre=='M') ? 'Male' : 'Female' }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->emailaddress }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>
                        <button onclick="window.location='{{ url('students/'.$row->idstudents) }}'" 
                        type="button" class="btn btn-sm btn-info" title="Edit Data">
                            <i class="fas fa-edit"></i>
                        </button>

                        <form onsubmit="return deleteData('{{ $row->fullname }}')" style="display: inline" method="POST" action="{{ url('students/'.$row->idstudents) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        </div>

        <script>
            function deleteData(name) {
                pesan = confirm(`Yakin data students dengan nama ${name} ini dihapus?`);
                if(pesan) return true;
                else return false;
            }
        </script>
@endsection