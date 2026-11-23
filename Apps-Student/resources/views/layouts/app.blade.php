<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Apps Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/students') }}">Apps Student</a>
            <div class="d-flex align-items-center">
                <span class="text-white me-3">{{ session('admin_username') }}</span>
                <form action="{{ url('/logout') }}" method="POST" class="mb-0">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>