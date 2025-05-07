@extends('layouts.user')

@section('title', 'Detail Kasus - ML ID: ' . $account->ml_id)

@section('content')
        <div class="container py-5">
            <h1 class="mb-4 text-warning fw-bold">Detail Kasus - ML ID: {{ $account->ml_id }}</h1>

            <div class="card bg-dark text-white">
                <div class="card-body">
                @if($account->header_picture_path)
                    <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . $account->header_picture_path) }}" alt="Header Picture" style="max-width: 100%; max-height: 300px; object-fit: contain;">
                    </div>
                @endif
                <p><strong>Created At:</strong>
                    {{ \Carbon\Carbon::parse($account->created_at)->format('d-m-Y') }}</p>
                <p><strong>Updated At:</strong>
                    {{ \Carbon\Carbon::parse($account->updated_at)->format('d-m-Y') }}</p>
                    <p><strong>ML ID:</strong> {{ $account->ml_id }}</p>
                    <p><strong>Server ID:</strong> {{ $account->server_id }}</p>
                    <p><strong>Pelaku Nickname:</strong> {{ $account->pelaku_nickname }}</p>
                    <p><strong>Korban Nickname:</strong> {{ $account->korban_nickname }}</p>
                    <p><strong>Tanggal Kejadian:</strong>
                        {{ \Carbon\Carbon::parse($account->tanggal_kejadian)->format('d-m-Y') }}</p>
                    <p><strong>Bukti Kasus:</strong></p>
                    @php
    $buktiFiles = is_array($account->bukti_file_path) ? $account->bukti_file_path : json_decode($account->bukti_file_path, true);
                    @endphp
                    @if($buktiFiles && count($buktiFiles) > 0)
                        <div class="d-flex flex-wrap gap-3">
                            @foreach($buktiFiles as $file)
                                @php
            $extension = pathinfo($file, PATHINFO_EXTENSION);
                                @endphp
                                @if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png']))
                                    <img src="{{ asset('storage/' . $file) }}" alt="Bukti Kasus"
                                        style="max-width: 200px; max-height: 200px; object-fit: contain;">
                                @elseif(strtolower($extension) === 'pdf')
                                    <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                        class="btn btn-warning text-black fw-semibold">Lihat PDF</a>
                                @else
                                    <a href="{{ asset('storage/' . $file) }}" target="_blank"
                                        class="btn btn-warning text-black fw-semibold">Lihat File</a>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <p>Tidak ada bukti kasus.</p>
                    @endif
                    <p class="mt-3"><strong>Kronologi:</strong> {{ $account->kronologi }}</p>
                    <a href="{{ route('dangerous.index') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Kasus</a>
                </div>
            </div>
        </div>
@endsection

<style>
    .container {
        margin-top: 100px;
    }
</style>