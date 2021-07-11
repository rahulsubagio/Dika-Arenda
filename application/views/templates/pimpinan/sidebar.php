<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <h5 class="text-white fw-bold ms-4 mt-3">PIMPINAN</h5>
        </ul>
        <ul class="nav flex-column px-3">
          <hr>

          <li class="nav-item">
            <div class="d-grid">
              <button class="btn btn-toggle align-items-center rounded collapsed sidebar-heading text-white fs-6" data-bs-toggle="collapse" data-bs-target="#kasir-collapse" aria-expanded="true">
                Kasir
              </button>
            </div>
            <div class="collapse <?= $this->session->flashdata('collapse_kasir'); ?>" id="kasir-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">

                <li class="nav-item">
                  <div class="d-grid">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-white fs-6 px-3" data-bs-toggle="collapse" data-bs-target="#penjualan-collapse" aria-expanded="true">
                      Penjualan
                    </button>
                    <div class="collapse <?= $this->session->flashdata('jualkasir'); ?>" id="penjualan-collapse">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li class="nav-item">
                          <a class="nav-link <?= $this->session->flashdata('jurnal'); ?>" aria-current="page" href="<?= base_url('pimpinan/jurnalKasir') ?>">
                            <span data-feather="home"></span>
                            Jurnal
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link <?= $this->session->flashdata('leger'); ?>" href="<?= base_url('pimpinan/legerKasir') ?>">
                            <span data-feather="file"></span>
                            Leger
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link <?= $this->session->flashdata('rekhar'); ?>" href="<?= base_url('pimpinan/rekapHarianKasir') ?>">
                            <span data-feather="shopping-cart"></span>
                            Rekap Harian
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link <?= $this->session->flashdata('rekbul'); ?>" href="<?= base_url('pimpinan/rekapBulananKasir') ?>">
                            <span data-feather="users"></span>
                            Rekap Bulanan
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link <?= $this->session->flashdata('rekjual'); ?>" href="<?= base_url('pimpinan/rekapPenjualanKasir') ?>">
                            <span data-feather="bar-chart-2"></span>
                            Rekap Penjualan
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>

                <li class="nav-item">
                  <div class="d-grid">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-white fs-6 px-3" data-bs-toggle="collapse" data-bs-target="#penyusutan-collapse" aria-expanded="true">
                      Penyusutan
                    </button>
                    <div class="collapse <?= $this->session->flashdata('susutkasir'); ?>" id="penyusutan-collapse">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li class="nav-item">
                          <a class="nav-link <?= $this->session->flashdata('susutMinggu'); ?>" href="<?= base_url('pimpinan/penyusutanMingguanKasir') ?>">
                            <span data-feather="home"></span>
                            Rekap Bulanan
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          <hr>

          <li class="nav-item">
            <div class="d-grid">
              <button class="btn btn-toggle align-items-center rounded collapsed sidebar-heading text-white fs-6" data-bs-toggle="collapse" data-bs-target="#marketing-collapse" aria-expanded="true">
                Marketing
              </button>
            </div>
            <div class="collapse <?= $this->session->flashdata('collapse_pembelian'); ?>" id="marketing-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">

                <li class="nav-item">
                  <div class="d-grid">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-white fs-6 px-3" data-bs-toggle="collapse" data-bs-target="#m-pembelian-collapse" aria-expanded="true">
                      Pembelian
                    </button>
                    <div class="collapse <?= $this->session->flashdata('market'); ?>" id="m-pembelian-collapse">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li class="nav-item">
                          <a class="nav-link <?= $this->session->flashdata('leger'); ?>" href="<?= base_url('pimpinan/legerPembelian') ?>">
                            <span data-feather="file"></span>
                            Leger
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link <?= $this->session->flashdata('rekhar'); ?>" href="<?= base_url('pimpinan/rekapHarianPembelian') ?>">
                            <span data-feather="shopping-cart"></span>
                            Rekap Harian
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link <?= $this->session->flashdata('rekbul'); ?>" href="<?= base_url('pimpinan/rekapBulananPembelian') ?>">
                            <span data-feather="users"></span>
                            Rekap Bulanan
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
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
        unset($_SESSION['collapse_kasir']);
        unset($_SESSION['collapse_marketing']);
        unset($_SESSION['collapse_jualkasir']);
        unset($_SESSION['collapse_susutkasir']);
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