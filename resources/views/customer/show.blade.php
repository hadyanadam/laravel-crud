@extends('layout.main')

@section('title', 'Detail Customer data')

@section('content')
    <div class="container my-5">
        <h1>Detail Customer</h1>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $customer->nama }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $customer->email }}</h6>
                <a href="#" class="card-link">Edit</a>
                <a href="{{ url('/customer') }}" class="card-link">Kembali</a>
            </div>
        </div>
    </div>
@endsection