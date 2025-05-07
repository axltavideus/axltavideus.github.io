@extends('layouts.admin')

@section('title', 'Admin - Manage Dangerous Accounts')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4 text-warning fw-bold">Manage Dangerous Accounts</h1>

        <div class="mb-4">
            <a href="{{ route('admin.dangerous_accounts.create') }}" class="btn btn-warning mb-3">Add New Dangerous
                Account</a>

            <form method="GET" action="{{ route('admin.dangerous_accounts.index') }}"
                class="d-flex align-items-center gap-2 mb-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                    class="form-control" style="width: 200px;">
                <label for="sort_by" class="fw-semibold text-warning">Sort By:</label>
                <select name="sort_by" id="sort_by" class="form-select" style="width: auto;">
                    <option value="tanggal_kejadian" {{ $sortBy == 'tanggal_kejadian' ? 'selected' : '' }}>Tanggal Kejadian
                    </option>
                    <option value="ml_id" {{ $sortBy == 'ml_id' ? 'selected' : '' }}>ML ID</option>
                    <option value="server_id" {{ $sortBy == 'server_id' ? 'selected' : '' }}>Server ID</option>
                    <option value="pelaku_nickname" {{ $sortBy == 'pelaku_nickname' ? 'selected' : '' }}>Pelaku Nickname
                    </option>
                    <option value="korban_nickname" {{ $sortBy == 'korban_nickname' ? 'selected' : '' }}>Korban Nickname
                    </option>
                </select>

                <select name="sort_order" id="sort_order" class="form-select" style="width: auto;">
                    <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>

                <button type="submit" class="btn btn-warning text-black fw-semibold px-4 py-2">Sort</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($dangerousAccounts->isEmpty())
            <p>No dangerous accounts found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ML ID</th>
                        <th>Server ID</th>
                        <th>Pelaku Nickname</th>
                        <th>Korban Nickname</th>
                        <th>Tanggal Kejadian</th>
                        <!-- <th>Bukti Kasus</th> -->
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Kronologi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dangerousAccounts as $account)
                        <tr>
                            <td>{{ $account->ml_id }}</td>
                            <td>{{ $account->server_id }}</td>
                            <td>{{ $account->pelaku_nickname }}</td>
                            <td>{{ $account->korban_nickname }}</td>
                            <td>{{ \Carbon\Carbon::parse($account->tanggal_kejadian)->format('d-m-Y') }}</td>
                            <!-- <td>
                                                                    @if($account->bukti_file_path)
                                                                        <a href="{{ asset('storage/' . $account->bukti_file_path) }}" target="_blank"
                                                                            class="text-warning">View Evidence</a>
                                                                    @else
                                                                        None
                                                                    @endif
                                                                </td> -->
                            <td>{{ \Carbon\Carbon::parse($account->created_at)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($account->updated_at)->format('d-m-Y') }}</td>
                            <td>{{ $account->kronologi }}</td>
                            <td>
                                <a href="{{ route('admin.dangerous_accounts.edit', $account->id) }}"
                                    class="btn btn-warning btn-sm mb-1">
                                    <i class="fas fa-edit" style="color: white;"></i> <!-- Edit Icon -->
                                </a>
                                <form action="{{ route('admin.dangerous_accounts.destroy', $account->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Are you sure you want to delete this dangerous account?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1">
                                        <i class="fas fa-trash"></i> <!-- Delete Icon -->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

<style>
    .container {
        margin-top: 20px;
    }
</style>