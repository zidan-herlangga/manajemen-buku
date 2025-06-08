<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #83a4d4, #b6fbff);
            min-height: 100vh;
        }

        .welcome-box {
            background-color: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <div class="welcome-box text-center">
            <h1 class="mb-4">📚 Aplikasi Manajemen Buku</h1>
            <p class="lead">Selamat datang di aplikasi CRUD Laravel 10</p>

            {{-- kalo udah login ganti button --}}
            @if (Auth::check())
                <a href="{{ route('books.index') }}" class="btn btn-success rounded-pill mt-3 px-4">📖 Lihat Buku</a>
            @endif

            {{-- kalo belum login --}}
            @if (!Auth::check())
                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill mt-3 px-4">🔐 Login Admin</a>
            @endif
        </div>
    </div>
</body>

</html>