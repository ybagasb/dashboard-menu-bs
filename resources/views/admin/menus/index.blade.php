<!DOCTYPE html>
<html>
<head>
    <title>Menu Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .url-cell {
            max-width: 280px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .url-cell a {
            display: inline-block;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <nav>
            <div class="d-flex justify-content-between align-items-center mb-3">

                <h3>Menu Admin</h3>

                <div class="d-flex gap-2">

                    {{-- SEARCH FORM --}}
                    <form method="GET" action="/admin/menus" class="d-flex">
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

                    {{-- LOGOUT --}}
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            Logout
                        </button>
                    </form>

                </div>
            </div>
        </nav>

        <a href="/admin/menus/create" class="btn btn-primary mb-3">
            Tambah Menu
        </a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Nama</th>
                    <th>Link</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <td>
                        @if($menu->icon)
                            <img src="{{ $menu->icon }}" width="40">
                        @endif
                    </td>
                    <td>{{ $menu->title }}</td>
                    <td class="url-cell">
                        <a href="{{ $menu->url }}" target="_blank" title="{{ $menu->url }}">
                            {{ $menu->url }}
                        </a>
                    </td>
                    <td>
                        <a href="/admin/menus/{{ $menu->id }}/edit"
                        class="btn btn-sm btn-warning">
                            Edit
                        </a>

                    <form action="{{ url('/admin/menus/'.$menu->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirmDelete('{{ $menu->title }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<script>
    function confirmDelete(title) {
        return confirm(
            'Apakah Anda yakin ingin menghapus menu "' + title + '"?\nTindakan ini tidak dapat dibatalkan.'
        );
    }
</script>
</html>
