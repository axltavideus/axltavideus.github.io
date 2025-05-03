@extends('layouts.user')

@section('title', 'Kasus - Daftar Akun Berbahaya')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-warning fw-bold">Daftar Akun Berbahaya</h1>

    <div class="mb-4">
        <form method="GET" action="{{ route('dangerous.index') }}" class="d-flex align-items-center gap-2">
            <label for="sort_by" class="fw-semibold text-warning">Sort By:</label>
            <select name="sort_by" id="sort_by" class="form-select" style="width: auto;">
                <option value="tanggal_kejadian" {{ $sortBy == 'tanggal_kejadian' ? 'selected' : '' }}>Tanggal Kejadian</option>
                <option value="ml_id" {{ $sortBy == 'ml_id' ? 'selected' : '' }}>ML ID</option>
                <option value="server_id" {{ $sortBy == 'server_id' ? 'selected' : '' }}>Server ID</option>
                <option value="pelaku_nickname" {{ $sortBy == 'pelaku_nickname' ? 'selected' : '' }}>Pelaku Nickname</option>
                <option value="korban_nickname" {{ $sortBy == 'korban_nickname' ? 'selected' : '' }}>Korban Nickname</option>
            </select>

            <select name="sort_order" id="sort_order" class="form-select" style="width: auto;">
                <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>

            <button type="submit" class="btn btn-warning text-black fw-semibold px-4 py-2">Sort</button>
        </form>
    </div>

    @if($dangerousAccounts->isEmpty())
        <p>Tidak ada akun berbahaya yang ditemukan.</p>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($dangerousAccounts as $account)
            <div class="col">
                <div class="card bg-dark text-white h-100">
                    <div class="card-body">
                        <h5 class="card-title">ML ID: {{ $account->ml_id }}</h5>
                        <p class="card-text"><strong>Server ID:</strong> {{ $account->server_id }}</p>
                        <p class="card-text"><strong>Pelaku Nickname:</strong> {{ $account->pelaku_nickname }}</p>
                        <p class="card-text"><strong>Korban Nickname:</strong> {{ $account->korban_nickname }}</p>
                        <p class="card-text"><strong>Tanggal Kejadian:</strong> {{ \Carbon\Carbon::parse($account->tanggal_kejadian)->format('d-m-Y') }}</p>
                        <p class="card-text"><strong>Bukti Kasus:</strong>
                            @if($account->bukti_file_path)
                                <a href="{{ asset('storage/' . $account->bukti_file_path) }}" target="_blank" class="text-warning">Lihat Bukti</a>
                            @else
                                Tidak ada
                            @endif
                        </p>
                        <p class="card-text"><strong>Kronologi:</strong> {{ $account->kronologi }}</p>
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