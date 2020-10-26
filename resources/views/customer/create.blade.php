@extends('layout.main')

@section('title', 'Add data')

@section('content')
    <div class="container col-6">
        <h1>Add data Customer</h1>
        <form method='post' action='{{ url('/customer') }}'>
            @csrf
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{old('nama')}}">
              @error('nama')
              <div class="invalid-feedback"> {{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{old('email')}}">
              @error('email')
              <div class="invalid-feedback"> {{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{old('alamat')}}">
              @error('alamat')
              <div class="invalid-feedback"> {{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" value="{{old('tempat_lahir')}}">
              @error('tempat_lahir')
              <div class="invalid-feedback"> {{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
              @error('tanggal_lahir')
              <div class="invalid-feedback"> {{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </form>
    </div>
    <script type="text/javascript">
      $(function () {
          $('#tanggal_lahir').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            minDate: new Date(1945, 1, 1)
          });
      })
  </script>
@endsection
