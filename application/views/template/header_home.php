
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