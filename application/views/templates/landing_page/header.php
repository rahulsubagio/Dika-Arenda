<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dika Arenda</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
        body {
            height: 100%;
            background-image: url("<?= base_url('assets/gambar/Background.jpg') ?>"),
                linear-gradient(rgba(75, 75, 75, 1), rgba(75, 75, 75, 0.3));
            background-size: cover;
            background-position: center;
            background-color: rgba(75, 75, 75, 0.3);
            background-blend-mode: overlay;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .icon {
            width: 100%;
            height: auto;
            display: block;
        }

        .icon-link {
            position: relative;
            width: 50%;
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/cover.css') ?>" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">Dika Arenda</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link <?= $this->session->flashdata('home'); ?>" aria-current="page" href="<?= base_url(); ?>">Home</a>
                    <a class="nav-link <?= $this->session->flashdata('about'); ?>" href="<?= base_url('home/'); ?>about">About Us</a>
                    <a class="nav-link" href="#">Contact</a>
                    <?php
                    unset($_SESSION['home']);
                    unset($_SESSION['about']);
                    ?>
                </nav>
            </div>
        </header>