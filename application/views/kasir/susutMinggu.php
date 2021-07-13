<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary">Rekapitulasi Penyusutan Bulanan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>
  <div class="card shadow-sm">
    <div class="card-body">
      <?php if ($this->session->flashdata('base') == "kasir") : ?>
        <form action="<?= base_url() ?>/kasir/penyusutanMingguan" method="POST" class="row g-3">
        <?php else : ?>
          <form action="<?= base_url() ?>/pimpinan/penyusutanMingguanKasir" method="POST" class="row g-3">
          <?php endif; ?>
          <div class="col-md-3">
            <?php if (isset($_POST['update'])) : ?>
              <h5>Bulan terpilih : <?= $bulan; ?></h5>
            <?php else : ?>
              <h5>Bulan Ini : <?= $bulan; ?></h5>
            <?php endif; ?>
          </div>
          <div class="col-md-9 row">
            <label class="col-form-label col-md-2">Pilih Bulan</label>
            <div class="col-md-5">
              <input type="month" class="form-control" name="bulan" max="<?= date("Y-m"); ?>">
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary" name="update">Cek &downdownarrows;</button>
            </div>
          </div>
          </form>
          <br>
          <table class="table table-hover">
            <thead class="table-light table-striped">
              <tr align="center">
                <th rowspan="3">No.</th>
                <th rowspan="3">Hari</th>
                <th rowspan="3">Tanggal</th>
                <th rowspan="2" colspan="2">Ayam Masuk</th>
                <th rowspan="2" colspan="2">Penjualan</th>
                <th colspan="6">Ayam Mati</th>
                <th colspan="4">Stock Ayam</th>
                <th rowspan="2" colspan="3">Penyusutan</th>
                <th rowspan="3"></th>
              </tr>
              <tr align="center">
                <th colspan="2">Kandang</th>
                <th colspan="2">Armada</th>
                <th colspan="2">RPA</th>
                <th colspan="2">Admin</th>
                <th colspan="2">Riil</th>
              </tr>
              <tr align="center">
                <th>Ekor</th>
                <th>Kg</th>
                <th>Ekor</th>
                <th>Kg</th>
                <th>Ekor</th>
                <th>Kg</th>
                <th>Ekor</th>
                <th>Kg</th>
                <th>Ekor</th>
                <th>Kg</th>
                <th>Ekor</th>
                <th>Kg</th>
                <th>Ekor</th>
                <th>Kg</th>
                <th>Ekor</th>
                <th>Kg %</th>
                <th>Ket</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($susut != NULL) :
                // $this->load->model('Kasir_model');
                $i = 1;
                foreach ($susut as $s) :
                  $tanggal =  strtotime($s['tanggal']);
                  $hari = date("D", $tanggal);

                  if ($hari == "Sun") :
              ?>
                    <tr class="table-success">
                    <?php else : ?>
                    <tr>
                    <?php endif; ?>
                    <td align="center"><?= $i; ?></td>
                    <td align="center"><?= $hari; ?></td>
                    <td align="center"><?= $s['tanggal']; ?></td>
                    <td align="center"><?= $s['ayam_masuk_ekor']; ?></td>
                    <td align="center"><?= number_format($s['ayam_masuk_kg'], 1, ",", "."); ?></td>
                    <td align="center"><?= $s['pj_ekor']; ?></td>
                    <td align="center"><?= number_format($s['pj_kg'], 1, ",", "."); ?></td>
                    <td align="center"><?= $s['mati_kandang_ekor']; ?></td>
                    <td align="center"><?= number_format($s['mati_kandang_kg'], 1, ",", ".");  ?></td>
                    <td align="center"><?= $s['mati_armada_ekor']; ?></td>
                    <td align="center"><?= number_format($s['mati_armada_kg'], 1, ",", "."); ?></td>
                    <td align="center"><?= $s['mati_rpa_ekor']; ?></td>
                    <td align="center"><?= number_format($s['mati_rpa_kg'], 1, ",", "."); ?></td>
                    <td align="center"><?= $s['admin_ekor']; ?></td>
                    <td align="center"><?= number_format($s['admin_kg'], 1, ",", "."); ?></td>
                    <td align="center"><?= $s['riil_ekor']; ?></td>
                    <td align="center"><?= number_format($s['riil_kg'], 1, ",", "."); ?></td>
                    <td align="center">-</td>
                    <td align="center"><?= number_format($s['persentase'], 1, ",", "."); ?>%</td>
                    <td align="center"></td>
                    <!-- <?php if ($this->session->flashdata('button') == "on") : ?>
                      <td align="center">
                        <a href="#" class="btn btn-primary btn-sm">Ubah</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                      </td>
                    <?php endif; ?> -->
                    </tr>
                <?php
                  $i++;
                endforeach;
              // endforeach;
              endif;
                ?>
            </tbody>
            <tfoot class="table-light">
              <tr>
                <!-- <td colspan="3">Subtotal</td>
            <td align="center">8.904</td>
            <td align="center">14.023,8</td>
            <td align="center">8.799</td>
            <td align="center">14.027,3</td>
            <td align="center">5</td>
            <td align="center">5,7</td>
            <td align="center">3</td>
            <td align="center">3,4</td>
            <td align="center">2</td>
            <td align="center">2,4</td>
            <td align="center">809</td>
            <td align="center">853,4</td>
            <td align="center">800</td>
            <td align="center">831,1</td> -->
                <?php if ($this->session->flashdata('button') == "on") : ?>
                  <td align="center" colspan="22">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
                  </td>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Penambahan Penyusutan Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url() ?>kasir/tambahDetailSusut" method="POST">
            <table align="center" class="table">
              <tr>
                <td>Pilih Tanggal</td>
                <td>
                  <input type="date" name="tanggal" required />
                </td>
              </tr>
              <tr align="center" class="table-primary">
                <td colspan="2">Ayam Masuk</td>
              </tr>
              <tr>
                <td>Jumlah (ekor)</td>
                <td>Jumlah (kg)</td>
              </tr>
              <tr>
                <td><input type="number" placeholder="Jumlah ayam (ekor)" name="ayam_masuk_ekor" min="0" required></td>
                <td><input type="text" placeholder="Jumlah ayam (kg)" name="ayam_masuk_kg" min="0" required></td>
              </tr>
              <tr align="center" class="table-dark">
                <td colspan="2">Ayam Mati</td>
              </tr>
              <tr align="center" class="table-primary">
                <td colspan="2">Mati Kandang</td>
              </tr>
              <tr>
                <td>Jumlah (ekor)</td>
                <td>Jumlah (kg)</td>
              </tr>
              <tr>
                <td><input type="number" placeholder="Jumlah ayam (ekor)" name="kandang_ekor" min="0" required></td>
                <td><input type="text" placeholder="Jumlah ayam (kg)" name="kandang_kg" min="0" required></td>
              </tr>
              <tr align="center" class="table-primary">
                <td colspan="2">Mati Armada</td>
              </tr>
              <tr>
                <td>Jumlah (ekor)</td>
                <td>Jumlah (kg)</td>
              </tr>
              <tr>
                <td><input type="number" placeholder="Jumlah ayam (ekor)" name="armada_ekor" min="0" required></td>
                <td><input type="text" placeholder="Jumlah ayam (kg)" name="armada_kg" min="0" required></td>
              </tr>
              <tr align="center" class="table-primary">
                <td colspan="2">Mati RPA</td>
              </tr>
              <tr>
                <td>Jumlah (ekor)</td>
                <td>Jumlah (kg)</td>
              </tr>
              <tr>
                <td><input type="number" placeholder="Jumlah ayam (ekor)" name="rpa_ekor" min="0" required></td>
                <td><input type="text" placeholder="Jumlah ayam (kg)" name="rpa_kg" min="0" required></td>
              </tr>
              <tr align="center" class="table-dark">
                <td colspan="2">Stock Ayam</td>
              </tr>
              <tr align="center" class="table-primary">
                <td colspan="2">Admin</td>
              </tr>
              <tr>
                <td>Jumlah (ekor)</td>
                <td>Jumlah (kg)</td>
              </tr>
              <tr>
                <td><input type="number" placeholder="Jumlah ayam (ekor)" name="admin_ekor" min="0" required></td>
                <td><input type="text" placeholder="Jumlah ayam (kg)" name="admin_kg" min="0" required></td>
              </tr>
              <tr align="center" class="table-primary">
                <td colspan="2">Riil</td>
              </tr>
              <tr>
                <td>Jumlah (ekor)</td>
                <td>Jumlah (kg)</td>
              </tr>
              <tr>
                <td><input type="number" placeholder="Jumlah ayam (ekor)" name="riil_ekor" min="0" required></td>
                <td><input type="text" placeholder="Jumlah ayam (kg)" name="riil_kg" min="0" required></td>
              </tr>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</main>