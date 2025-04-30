@extends('layouts.user')

@section('title', 'Lapor')

@section('content')

    <div class="container py-5">
        <h1 class="mb-4 text-warning fw-bold">Lapor Kasus</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-success text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 bg-danger text-white rounded">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dangerous.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-12">
                <label for="ml_id" class="form-label fw-semibold text-warning">ML ID <span class="text-danger">*</span></label>
                <input type="text" name="ml_id" id="ml_id" value="{{ old('ml_id') }}" required class="form-control" />
            </div>
            <div class="col-12">
                <label for="server_id" class="form-label fw-semibold text-warning">Server ID</label>
                <input type="text" name="server_id" id="server_id" value="{{ old('server_id') }}" class="form-control" />
            </div>
            <div class="col-12">
                <label for="pelaku_nickname" class="form-label fw-semibold text-warning">Pelaku Nickname</label>
                <input type="text" name="pelaku_nickname" id="pelaku_nickname" value="{{ old('pelaku_nickname') }}" class="form-control" />
            </div>
            <div class="col-12">
                <label for="korban_nickname" class="form-label fw-semibold text-warning">Korban Nickname</label>
                <input type="text" name="korban_nickname" id="korban_nickname" value="{{ old('korban_nickname') }}" class="form-control" />
            </div>
            <div class="col-12">
                <label for="tanggal_kejadian" class="form-label fw-semibold text-warning">Tanggal Kejadian</label>
                <input type="date" name="tanggal_kejadian" id="tanggal_kejadian" value="{{ old('tanggal_kejadian') }}" class="form-control" />
            </div>
            <div class="col-12">
                <label for="bukti_kasus" class="form-label fw-semibold text-warning">Bukti Kasus (jpg, jpeg, png, pdf max 2MB)</label>
                <input type="file" name="bukti_kasus" id="bukti_kasus" accept=".jpg,.jpeg,.png,.pdf" class="form-control" />
            </div>
            <div class="col-12">
                <label for="kronologi" class="form-label fw-semibold text-warning">Kronologi</label>
                <textarea name="kronologi" id="kronologi" rows="4" class="form-control">{{ old('kronologi') }}</textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-warning text-black fw-semibold px-4 py-2">Kirim Laporan</button>
            </div>
        </form>
    </div>
    <!-- <?php phpinfo(); ?> -->
@endsection