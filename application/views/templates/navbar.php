<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dika Arenda</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/dashboard.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/sidebars.css') ?>">
</head>

<body class="bg-light">

  <header class="navbar navbar-light sticky-top flex-md-nowrap p-0 shadow bg-white">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fw-bold text-center fs-5 text-white" href="<?= base_url(); ?>">Dika Arenda</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="<?= base_url('home') ?>">Logout</a>
      </li>
    </ul>
  </header>