<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Aplikasi Buku - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background: linear-gradient(45deg, #0d6efd, #6610f2);
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .card {
            border-radius: 1rem;
        }

        footer {
            font-size: 14px;
        }

        @media print {

            nav,
            .btn,
            footer {
                display: none !important;
            }

            body {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">📚 Aplikasi Buku</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('books*') ? 'active fw-semibold text-warning' : '' }}"
                            href="{{ route('books.index') }}">
                            <i class="bi bi-journal-bookmark"></i> Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categories*') ? 'active fw-semibold text-warning' : '' }}"
                            href="{{ route('categories.index') }}">
                            <i class="bi bi-tags"></i> Kategori
                        </a>
                    </li>
                </ul>

                @auth
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm rounded-pill">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container my-4">
        @yield('content')
    </main>

    <footer class="bg-light text-center py-3 mt-5 shadow-sm">
        <p class="mb-0 text-secondary">© {{ date('Y') }} Aplikasi Buku – Dibuat dengan ❤️ <br /> Tugas Web
            Programming 2</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
