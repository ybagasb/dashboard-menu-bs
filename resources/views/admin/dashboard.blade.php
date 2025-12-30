<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-light bg-light px-4">
  <span class="navbar-brand">Admin Panel</span>
  <form method="POST" action="/logout">
    @csrf
    <button class="btn btn-sm btn-danger">Logout</button>
  </form>
</nav>

<div class="container mt-4">
  <h3>Selamat datang Admin</h3>
</div>

</body>
</html>