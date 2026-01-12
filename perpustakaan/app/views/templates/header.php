<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="<?= BASEURL; ?>">Perfeelus</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="<?= BASEURL; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL; ?>/buku">Daftar Buku</a>
        </li>
      </ul>
      
      <ul class="navbar-nav ms-auto">
        <?php if(isset($_SESSION['user_login'])) : ?>
            <li class="nav-item d-flex align-items-center">
                <span class="text-light me-3">Halo, <?= $_SESSION['nama_user']; ?> (<?= $_SESSION['role']; ?>)</span>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-danger text-white px-3" href="<?= BASEURL; ?>/login/logout">Logout</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link btn btn-light text-dark px-3" href="<?= BASEURL; ?>/login">Login</a>
            </li>
        <?php endif; ?>
      </ul>
      
    </div>
  </div>
</nav>