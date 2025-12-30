<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3>Tambah Menu</h3>

    <form action="/admin/menus" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label>Judul Menu</label>
            <input type="text" name="title"
                value="{{ old('title') }}"
                class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>URL</label>
            <input type="text" name="url"
                value="{{ old('url') }}"
                class="form-control @error('url') is-invalid @enderror">
            @error('url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Icon URL</label>
            <input type="text" name="icon"
                value="{{ old('icon') }}"
                class="form-control @error('icon') is-invalid @enderror">
            @error('icon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/menus" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
