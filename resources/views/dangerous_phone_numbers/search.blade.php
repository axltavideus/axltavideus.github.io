@extends('layouts.user')

@section('title', 'Cek Nomor Telepon Berbahaya')

@section('content')
<div class="container py-5" style="margin-top: 100px;">
    <h1 class="mb-4 text-warning fw-bold">Cek Nomor Telepon Berbahaya</h1>

    <form action="{{ route('dangerous_phone_numbers.search') }}" method="POST" class="mb-4">
        @csrf
        <div class="input-group input-group-lg mb-3">
            <input type="text" placeholder="Masukan Nomor Telepon atau Kata Kunci" name="search" id="search" class="form-control" value="{{ old('search', $search ?? '') }}" required>
            <button type="submit" class="btn btn-warning">Cek</button>
        </div>
        @error('search')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
        </div>
    @endif
</div>
@endsection
<style>
    .container {
        margin-top: 100px;
    }

        
    h1.text-warning {
        color: #F4B446 !important;
    }

    .btn-warning {
        background-color: #F4B446 !important;
        color: white !important;
    }
</style>
