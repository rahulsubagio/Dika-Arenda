<body>
    <nav class="navbar navbar-dark bg-dark">
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
    </nav>
