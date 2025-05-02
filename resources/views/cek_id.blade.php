@extends('layouts.user')

@section('title', 'Cek ID Akun')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-warning fw-bold">Cek ID Akun</h1>

    <form action="{{ route('dangerous.cekIdSubmit') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">Masukkan ID Akun</label>
            <input type="text" name="id" id="id" class="form-control" value="{{ old('id', $inputId ?? '') }}" required>
            @error('id')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cek</button>
    </form>

    @isset($mlId)
        @if($mlId)
            <div class="alert alert-success">
                <strong>ML ID ditemukan:</strong> {{ $mlId }}
            </div>
        @else
            <div class="alert alert-danger">
                ML ID tidak ditemukan untuk ID yang dimasukkan.
            </div>
        @endif
    @endisset
</div>
@endsection
