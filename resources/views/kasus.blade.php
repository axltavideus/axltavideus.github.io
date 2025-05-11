@extends('layouts.user')

@section('title', 'Kasus - Daftar Akun Berbahaya')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4 text-warning fw-bold">Daftar Akun Berbahaya</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-4">
        <form method="GET" action="{{ route('dangerous.index') }}" class="d-flex align-items-center gap-2">
            <input type="text" name="search" class="form-control" placeholder="Masukkan ML ID..."
                value="{{ old('search', $search ?? '') }}">
            <button type="submit" class="btn btn-warning text-black fw-semibold px-4 py-2">Search</button>
        </form>
    </div>

        @if($dangerousAccounts->isEmpty())
            <p>Tidak ada akun berbahaya yang ditemukan.</p>
        @else
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($dangerousAccounts as $account)
                    <div class="col">
                        <div class="card bg-dark text-white h-100 d-flex align-items-center justify-content-center">
                            <div class="card-body text-center">
                                <h5 class="card-title">ML ID: {{ $account->ml_id }}</h5>
                                <a href="{{ route('dangerous.show', $account->ml_id) }}"
                                    class="btn btn-warning text-black fw-semibold px-4 py-2 mt-3">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

<style>
    .container {
        margin-top: 100px;
    }
</style>