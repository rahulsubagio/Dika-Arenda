<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <h5 class="text-white fw-bold ms-4 mt-3">MARKETING</h5>
        </ul>

        <ul class="nav flex-column px-3">
          <hr>
          <li class="nav-item">
            <div class="d-grid">
              <button class="btn btn-toggle align-items-center rounded collapsed sidebar-heading text-white fs-6" data-bs-toggle="collapse" data-bs-target="#pembelian" aria-expanded="true">
                Pembelian
              </button>
            </div>
            <div class="collapse <?= $this->session->flashdata('collapse_pembelian'); ?>" id="pembelian">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">

                <li class="nav-item">
                  <a class="nav-link <?= $this->session->flashdata('jurnalBeli'); ?>" aria-current="page" href="<?= base_url('marketing/jurnalPembelian') ?>">
                    <span data-feather="home"></span>
                    Jurnal
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= $this->session->flashdata('legerBeli'); ?>" href="<?= base_url('marketing/legerPembelian') ?>">
                    <span data-feather="file"></span>
                    Leger
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= $this->session->flashdata('rekharBeli'); ?>" href="<?= base_url('marketing/rekapHarianPembelian') ?>">
                    <span data-feather="shopping-cart"></span>
                    Rekap Harian
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= $this->session->flashdata('rekbulBeli'); ?>" href="<?= base_url('marketing/rekapBulananPembelian') ?>">
                    <span data-feather="bar-chart-2"></span>
                    Rekap Bulanan
                  </a>
                </li>

              </ul>
            </div>
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
        unset($_SESSION['jurnalBeli']);
        unset($_SESSION['legerBeli']);
        unset($_SESSION['rekharBeli']);
        unset($_SESSION['rekmingBeli']);
        unset($_SESSION['rekbulBeli']);
        unset($_SESSION['jurnalJual']);
        unset($_SESSION['legerJual']);
        unset($_SESSION['rekharJual']);
        unset($_SESSION['rekmingJual']);
        unset($_SESSION['rekbulJual']);
        unset($_SESSION['collapse_pembelian']);
        unset($_SESSION['collapse_penjualan']);
        ?>
      </div>
    </nav>