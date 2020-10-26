@extends('layout.main')

@section('title', 'Customer')

@section('content')
    <div class="container my-5">
        <a href="{{ url('/customer/create') }}" class="btn btn-primary mb-3">Add data</a>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('delete-success'))
            <div class="alert alert-danger">
                {{ session('delete-success') }}
            </div>
        @endif
        <h1>Daftar Customer</h1>
        <table class="table" id="table-customer">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach( $customers as $customer )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $customer->nama }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->alamat }}</td>
                <td>{{ $customer->tempat_lahir }}</td>
                <td>{{ $customer->tanggal_lahir }}</td>
                <td>
                    <a href="{{ url("/customer/{$customer->id}/edit") }}" class="badge badge-success">edit</a>
                    <a href='{{ url("/customer/{$customer->id}") }}' class="badge badge-primary">detail</a>
                    <form action='{{ url("/customer/{$customer->id}") }}' method='post' class='d-inline'>
                        @method('delete')
                        @csrf
                        <button type="submit" class="badge badge-danger">delete</button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
      $(document).ready(function() {
        $('#table-customer').DataTable();
      } );
    </script>
@endsection
