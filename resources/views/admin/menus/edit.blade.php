<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3>Edit Menu</h3>

    <form method="POST" action="/admin/menus/{{ $menu->id }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Menu</label>
            <input name="title" class="form-control"
                   value="{{ $menu->title }}" required>
        </div>

        <div class="mb-3">
            <label>Link</label>
            <input name="url" class="form-control"
                   value="{{ $menu->url }}" required>
        </div>

        <div class="mb-3">
            <label>Icon URL</label>
            <input name="icon" class="form-control"
                   value="{{ $menu->icon }}">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/admin/menus" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
