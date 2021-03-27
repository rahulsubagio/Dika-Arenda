<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <h5 class="text-white fw-bold ms-4 mt-3">KASIR</h5>
        </ul>
        <ul class="nav flex-column px-3">
          <hr>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-white fs-6">
            <span>Penjualan</span>
          </h6>
          <li class="nav-item">
            <a class="nav-link <?= $this->session->flashdata('jurnal'); ?>" aria-current="page" href="<?= base_url('kasir/jurnal') ?>">
              <span data-feather="home"></span>
              Jurnal
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $this->session->flashdata('leger'); ?>" href="<?= base_url('kasir/leger') ?>">
              <span data-feather="file"></span>
              Leger
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $this->session->flashdata('rekhar'); ?>" href="<?= base_url('kasir/rekapHarian') ?>">
              <span data-feather="shopping-cart"></span>
              Rekap Harian
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link <?= $this->session->flashdata('rekbul'); ?>" href="<?= base_url('kasir/rekapBulanan') ?>">
              <span data-feather="users"></span>
              Rekap Bulanan
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link <?= $this->session->flashdata('rekjual'); ?>" href="<?= base_url('kasir/rekapPenjualan') ?>">
              <span data-feather="bar-chart-2"></span>
              Rekap Penjualan
            </a>
          </li>
          <hr>
        </ul>

        <ul class="nav flex-column px-3">
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-white fs-6">
            <span>penyusutan</span>
          </h6>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
              <span data-feather="home"></span>
              Rekap Mingguan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
<<<<<<< HEAD
              Rekap Bulanan
            </a>
          </li>
          <hr>
        </ul>

        <ul class="nav flex-column px-3">
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-white fs-6">
            <span>user</span>
          </h6>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= base_url('home') ?>">
=======
              Orders
            </a>
          </li>
        </ul>

        <ul class="nav flex-column px-3">
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3   mb-1 text-white fs-6">
            <span>user</span>
          </h6>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">
>>>>>>> main
              <span data-feather="user"></span>
              Logout
            </a>
          </li>
        </ul>
<<<<<<< HEAD

        <?php
        unset($_SESSION['jurnal']);
        unset($_SESSION['leger']);
        unset($_SESSION['rekhar']);
        unset($_SESSION['rekbul']);
        unset($_SESSION['rekjual']);
        ?>
=======
>>>>>>> main
      </div>
    </nav>