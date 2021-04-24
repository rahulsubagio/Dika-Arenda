<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary"><?= $this->session->flashdata('judul'); ?></h1>
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
      <?php if ($this->session->flashdata('judul') == "Rekapitulasi Transaksi Harian") : ?>
        <form action="<?= base_url() ?>/kasir/rekapHarian" method="POST" class="row g-3">
        <?php else : ?>
          <form action="<?= base_url() ?>/kasir/jurnal" method="POST" class="row g-3">
          <?php endif; ?>
          <div class="col-md-3">
            <?php if (isset($_POST['update'])) : ?>
              <h5>Hari terpilih : <?= date($hari); ?></h5>
            <?php else : ?>
              <h5>Hari Ini : <?= date("d M Y"); ?></h5>
            <?php endif; ?>
          </div>
          <div class="col-md-9 row">
            <label class="col-form-label col-md-2">Pilih Tanggal</label>
            <div class="col-md-5">
              <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" name="update">Cek &downdownarrows;</button>
            </div>
          </div>
          </form>
          <br>
          <table class="table table-hover">
            <thead class="table-light">
              <tr align="center">
                <th rowspan="2">No.</th>
                <th rowspan="2">Customer</th>
                <th rowspan="2">Code</th>
                <th colspan="2">Jumlah</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>a</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <?php if ($this->session->flashdata('button') == "on") : ?>
                  <th rowspan="2"></th>
                <?php endif; ?>
              </tr>
              <tr align="center">
                <th>Ekor</th>
                <th>Kg</th>
                <th>Rp</th>
                <th>Rp</th>
                <th>Rp</th>
                <th>Rp</th>
                <th>Rp</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($transaksi)) :
                $i = 1;
              ?>
                <?php foreach ($transaksi as $t) : ?>
                  <tr>
                    <td align="center"><?= $i; ?>.<?php $i++; ?></td>
                    <td><?= $t['nama_customer']; ?></td>
                    <td align="center"><?= $t['code']; ?></td>
                    <td align="center"><?= $t['ekor']; ?></td>
                    <td align="center"><?= number_format($t['kg'], 1, ",", "."); ?></td>
                    <td align="center"><?= number_format($t['harga'], 0, ",", "."); ?></td>
                    <td align="center"><?= number_format($t['jumlah'], 0, ",", "."); ?></td>
                    <td align="center"><?= number_format($t['a_kompensasi'], 0, ",", "."); ?></td>
                    <td align="center"><?= number_format($t['total'], 0, ",", "."); ?></td>
                    <td align="center"><?= number_format($t['pembayaran'], 0, ",", "."); ?></td>
                    <?php if ($this->session->flashdata('button') == "on") : ?>
                      <td align="center">
                        <a href="<?= base_url(); ?>kasir/editTransaksi/<?= $t['id_penjualan']; ?>" class="btn btn-primary btn-sm">Ubah</a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus transaksi tersebut?')">Hapus</a>
                      </td>
                    <?php endif; ?>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
            <tfoot class="table-light">
              <tr>
                <td colspan="3">Subtotal</td>
                <td align="center"><?= $subtotal['ekor']; ?></td>
                <td align="center"><?= number_format($subtotal['kg'], 1, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['harga'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['jumlah'], 0, ",", "."); ?></td>
                <?php
                if ($subtotal['a'] == NULL) {
                  $a = 0;
                }
                ?>
                <td align="center"><?= number_format($a, 2, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['total'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['pembayaran'], 0, ",", "."); ?></td>
                <?php if ($this->session->flashdata('button') == "on") : ?>
                  <td align="center">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah</button>
                  </td>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>
    </div>
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>kasir/tambahTransaksi" method="POST">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Penambahan Transaksi Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <table align="center" class="table">
              <tr align="center" class="table-dark">
                <td colspan="2">Customer</td>
              </tr>
              <tr align="center" class="table-primary">
                <td colspan="2">Customer Lama</td>
              </tr>
              <tr>
                <td>Code Customer</td>
                <td>
                  <?php if (isset($customer)) : ?>
                    <select name="customer" id="">
                      <option value="">Pilih Code - Nama</option>
                      <?php foreach ($customer as $c) : ?>
                        <option value="<?= $c['code']; ?>"><?= $c['code']; ?> - <?= $c['nama_customer']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  <?php endif; ?>
                </td>
              </tr>
              <tr align="center" class="table-primary">
                <td colspan="2">Customer Baru</td>
              </tr>
              <tr>
                <td>Jenis Customer</td>
                <td>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="customer" value="customer">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Customer -> Code Terbaru : (C<?= $countCustomer; ?>)
                    </label>
                    <input type="hidden" name="codeCustomerBaru" value="C<?= $countCustomer; ?>">
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="umum" value="umum">
                    <label class="form-check-label" for="flexRadioDefault2">
                      Umum -> Code Terbaru : (U<?= $countUmum; ?>)
                    </label>
                    <input type="hidden" name="codeUmumBaru" value="U<?= $countUmum; ?>">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><input type="text" name="customerBaru" placeholder="Nama customer"></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamatBaru" placeholder="Alamat Customer"></td>
              </tr>
              <tr align="center" class="table-dark">
                <td colspan="2">Transaksi Pembelian</td>
              </tr>
              <tr>
                <td>Jumlah (Ekor)</td>
                <td><input name="ekor" type="number" min="0" placeholder="Jumlah ayam (ekor)" required></td>
              </tr>
              <tr>
                <td>Berat (Kg)</td>
                <td><input name="kg" type="text" min="0" placeholder="Berat total ayam (kg)" required></td>
              </tr>
              <tr>
                <td>Harga (Rp.)</td>
                <td><input name="harga" type="number" min="0" placeholder="Harga ayam per kg" required></td>
              </tr>
              <tr>
                <td>Jumlah</td>
                <td>
                  <fieldset disabled="disabled">
                    <input type="number" value="">
                  </fieldset>
                  Bagian JS buat perhitungan langsungnya (Harga * Kg)
                </td>
              </tr>
              <tr>
                <td>a</td>
                <td><input name="a" type="number" min="0" placeholder="kompensasi per kg" required></td>
              </tr>
              <tr>
                <td>Total</td>
                <td>
                <td>
                  <fieldset disabled="disabled">
                    <input type="number" value="">
                  </fieldset>
                  Bagian JS buat perhitungan langsungnya (Jumlah - (a * Kg))
                </td>
              </tr>
              <tr align="center" class="table-dark">
                <td colspan="2">Bagian Pembayaran</td>
              </tr>
              <tr>
                <td>Pembayaran (Rp.)</td>
                <td><input name="pembayaran" type="number" min="0" placeholder="Pembayaran dalam rupiah" required></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah / Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</main>