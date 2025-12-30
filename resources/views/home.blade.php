<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Link</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <span class="navbar-brand fw-bold">Dashboard Link</span>

        <div class="d-flex align-items-center">

            {{-- SEARCH --}}
            <form method="GET" action="/" class="d-flex me-3">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control form-control-sm me-2"
                    placeholder="Cari menu...">

                <button class="btn btn-sm btn-outline-primary">
                    Cari
                </button>
            </form>

            {{-- ADMIN LOGIN --}}
            <a href="/login" class="btn btn-sm btn-outline-secondary">
                Admin Login
            </a>
        </div>
    </div>
</nav>

<div class="container py-4">

    <h4 class="mb-4">Akses Cepat Sistem Internal</h4>

    <div class="row g-4">
        @forelse ($menus as $menu)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body d-flex flex-column">

                        {{-- ICON --}}
                        @if($menu->icon)
                            <img src="{{ $menu->icon }}"
                                class="mx-auto mb-3"
                                style="width:64px;height:64px;object-fit:contain;">
                        @endif

                        {{-- TITLE --}}
                        <h6 class="fw-semibold mb-3" style="
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;">
                            {{ $menu->title }}
                        </h6>

                        {{-- BUTTON (SELALU DI BAWAH) --}}
                        <a href="{{ $menu->url }}"
                        target="_blank"
                        class="btn btn-primary btn-sm mt-auto">
                            Buka Aplikasi
                        </a>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Belum ada menu yang ditambahkan
                </div>
            </div>
        @endforelse
    </div>

</div>

</body>
</html>
