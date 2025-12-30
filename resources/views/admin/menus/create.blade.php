<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3>Tambah Menu</h3>

    <form method="POST" action="/admin/menus">
        @csrf

        <div class="mb-3">
            <label>Nama Menu</label>
            <input name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Link</label>
            <input name="url" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Icon URL</label>
            <input name="icon" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/menus" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
