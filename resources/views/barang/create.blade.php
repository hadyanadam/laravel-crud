@extends('layout.main')

@section('title', 'Add data')

@section('content')
    <div class="container col-6">
        <h1>Add data Barang</h1>
        <form method='post' action='{{ url('/barang') }}'>
            @csrf
            <div class="form-group">
                <label for="customer_id d-block">Customer</label>
                <select id="customer_id" name="customer_id" class="form-control col-8 d-inline-block">
                    <option selected>Pilih</option>
                    @foreach ($customers as $customer)
                    <option value={{ $customer->id }}>{{ $customer->nama }}</option>
                    @endforeach
                </select><a class="btn btn-success" data-toggle="collapse" data-target="#customerToggle">+</a>
            </div>
            <div class="collapse" id="customerToggle">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{old('nama')}}">
                    @error('nama')
                    <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Jenis" name="jenis" value="{{old('jenis')}}">
                    @error('jenis')
                    <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
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
