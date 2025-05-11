<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: row;
        }
        .sidebar {
            width: 250px;
            background-color: #4E4E50;
            min-height: 100vh;
            color: white;
            padding-top: 1rem;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.75rem 1.25rem;
        }
        .sidebar a.active, .sidebar a:hover {
            background-color:rgb(99, 99, 100);
            color: #ffc107;
        }
        .content {
            flex-grow: 1;
            padding: 1rem 2rem;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center mb-4">Admin Panel</h4>
        <a href="{{ route('admin.dangerous_accounts.index') }}" class="{{ request()->routeIs('admin.dangerous_accounts.*') ? 'active' : '' }}">Dangerous Accounts</a>
        <a href="{{ route('admin.dangerous_phone_numbers.index') }}" class="{{ request()->routeIs('admin.dangerous_phone_numbers.*') ? 'active' : '' }}">Dangerous Phone Numbers</a>
        <a href="{{ route('admin.grup_jual_beli_cards.index') }}" class="{{ request()->routeIs('admin.grup_jual_beli_cards.*') ? 'active' : '' }}">Grup Jual Beli Cards</a>
        <form method="POST" action="{{ route('admin.logout') }}" class="mt-4 px-3">
            @csrf
            <button type="submit" class="btn btn-warning w-100">Logout</button>
        </form>
    </div>
    <div class="content">
        <nav class="navbar navbar-expand navbar-custom mb-4">
            <div class="container-fluid">
                <span class="navbar-brand text-warning fw-bold">@yield('title', 'Admin Panel')</span>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>
