@extends('layout.main')

@section('title', 'Barang')

@section('content')
    <div class="container my-5">
        <a href="{{ url('/barang/create') }}" class="btn btn-primary mb-3">Add data</a>
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
        <h1>Daftar Barang</h1>
        <table class="table" id="table-barang">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach( $barangs as $barang )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $barang->nama }}</td>
                <td>{{ $barang->jenis }}</td>
                <td>{{ $barang->customer->nama }}</td>
                <td>
                    <a href="{{ url("/barang/{$barang->id}/edit") }}" class="badge badge-success">edit</a>
                    <a href='{{ url("/barang/{$barang->id}") }}' class="badge badge-primary">detail</a>
                    <form action='{{ url("/barang/{$barang->id}") }}' method='post' class='d-inline'>
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
        $('#table-barang').DataTable();
      } );
    </script>
@endsection
