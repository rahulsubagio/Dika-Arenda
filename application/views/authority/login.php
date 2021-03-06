<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dika Arenda</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/form.css') ?>" rel="stylesheet">
</head>

<body>
  <div class="container text-center">
    <div class="card shadow m-auto rounded-3" style="width: 25rem;">
      <div class="card-body">
        <img src="<?= base_url('assets/gambar/Ayam.png') ?>" width="100">
        <h1 class="card-title h2 fw-bold" style="color: #F5A433;">Dika Arenda</h1>
        <form class="form-signin" action="<?= base_url('auth/login') ?>" method="POST">

          <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
          <!-- <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
              <?= $this->session->flashdata('success') ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('failed')) : ?>
            <div class="alert alert-danger" role="alert">
              <?= $this->session->flashdata('failed') ?>
            </div>
          <?php endif; ?> -->
          <input type="text" id="email" name="username" class="form-control" placeholder="Username" required autofocus>
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
          <div class="text-center">
            <a class="note text-decoration-none" href="#">Create an Account!</a>
          </div>
          <hr>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Login</button>
            <a class="btn btn-danger" type="button" href="<?= base_url('home') ?>">Kembali</a>
          </div>
        </form>
      </div>
    </div>
    <p class="mt-5 mb-3 text-muted">Copyright 2021 &copy; <b>UD Dika Arenda</b></p>
  </div>
</body>

</html>