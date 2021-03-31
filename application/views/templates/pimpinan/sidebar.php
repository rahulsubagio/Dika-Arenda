<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <h5 class="text-white fw-bold ms-4 mt-3">Pimpinan</h5>
        </ul>
        <ul class="nav flex-column px-3">
          <hr>

          <ul class="list-unstyled ps-0">
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Home
              </button>
              <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark rounded">Overview</a></li>
                  <li><a href="#" class="link-dark rounded">Updates</a></li>
                  <li><a href="#" class="link-dark rounded">Reports</a></li>
                </ul>
              </div>
            </li>
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                Dashboard
              </button>
              <div class="collapse" id="dashboard-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark rounded">Overview</a></li>
                  <li><a href="#" class="link-dark rounded">Weekly</a></li>
                  <li><a href="#" class="link-dark rounded">Monthly</a></li>
                  <li><a href="#" class="link-dark rounded">Annually</a></li>
                </ul>
              </div>
            </li>
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                Orders
              </button>
              <div class="collapse" id="orders-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark rounded">New</a></li>
                  <li><a href="#" class="link-dark rounded">Processed</a></li>
                  <li><a href="#" class="link-dark rounded">Shipped</a></li>
                  <li><a href="#" class="link-dark rounded">Returned</a></li>
                </ul>
              </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
              <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Account
              </button>
              <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark rounded">New...</a></li>
                  <li><a href="#" class="link-dark rounded">Profile</a></li>
                  <li><a href="#" class="link-dark rounded">Settings</a></li>
                  <li><a href="#" class="link-dark rounded">Sign out</a></li>
                </ul>
              </div>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-white fs-6">
            <span>Penjualan</span>
          </h6>

            <li class="nav-item ">
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
            <a class="nav-link <?= $this->session->flashdata('susutMinggu'); ?>" href="<?= base_url('kasir/penyusutanMingguan') ?>">
              <span data-feather="home"></span>
              Rekap Mingguan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $this->session->flashdata('susutBulan'); ?>" href="<?= base_url('kasir/penyusutanBulanan') ?>">
              <span data-feather="file"></span>
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
              <span data-feather="user"></span>
              Logout
            </a>
          </li>
        </ul>

        <?php
        unset($_SESSION['jurnal']);
        unset($_SESSION['leger']);
        unset($_SESSION['rekhar']);
        unset($_SESSION['rekbul']);
        unset($_SESSION['rekjual']);
        unset($_SESSION['susutMinggu']);
        unset($_SESSION['susutBulan']);
        ?>
      </div>
    </nav>