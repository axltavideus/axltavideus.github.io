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
    </form>

    @isset($dangerousPhoneNumbers)
        @if($dangerousPhoneNumbers && !$notFound)
            <div class="card mb-4 p-3 bg-light border border-warning rounded alert">
                <h4>Daftar Nomor Telepon Berbahaya</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nomor Telepon</th>
                            <th>Keterangan</th>
                            <th>Tanggal Dilaporkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dangerousPhoneNumbers as $phone)
                        <tr>
                            <td>{{ $phone->phone_number }}</td>
                            <td>{{ $phone->keterangan ?? '-' }}</td>
                            <td>{{ $phone->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif($notFound)
            <div class="alert alert-danger">
                Nomor telepon tidak ditemukan untuk input yang dimasukkan.
            </div>
        @endif
    @endisset
</div>
@endsection
<style>
    .container {
        margin-top: 100px;
    }

        
    h1.text-warning {
        color: #F4B446 !important;
    }
</style>