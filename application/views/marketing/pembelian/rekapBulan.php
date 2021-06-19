<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary"><?= $this->session->flashdata('judul'); ?></h1>

    <!-- <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalVendor">Vendor +</button>
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalKandang">Kandang +</button>
      </div>
    </div> -->

  </div>
  <div class="card shadow-sm">
    <div class="card-body">

      <?php if ($this->session->flashdata('base') == "marketing") : ?>
        <form action="<?= base_url() ?>marketing/rekapBulananPembelian/" method="POST" class="row g-3">
        <?php else : ?>
          <form action="<?= base_url() ?>/pimpinan/rekapBulananPembelian" method="POST" class="row g-3">
          <?php endif; ?>

          <div class="col-md-3">
            <?php if (isset($_POST['update'])) : ?>
              <h5>Periode : <?= $bulan; ?></h5>
            <?php else : ?>
              <h5>Periode : <?= date("M Y"); ?></h5>
            <?php endif; ?>
          </div>
          <div class="col-md-9 row">
            <label class="col-form-label col-md-2">Pilih Bulan</label>
            <div class="col-md-5">
              <input type="month" class="form-control" required name="bulan" max="<?= date("Y-m"); ?>">
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
                <th rowspan="2">Vendor</th>
                <th colspan="2">Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Saldo</th>
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
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              if (isset($_POST['update'])) :
                foreach ($dataTransaksi as $transaksi) : ?>
                  <tr>
                    <td align="center"><?= $i; ?>.</td>
                    <td><?= $transaksi['nama_vendor']; ?></td>
                    <td align="center"><?= $transaksi['ekor']; ?></td>
                    <td align="center"><?= number_format($transaksi['kg'], 1, ",", "."); ?></td>
                    <td align="center"><?= number_format($transaksi['harga'], 0, ",", "."); ?></td>
                    <td align="center"><?= number_format($transaksi['total'], 0, ",", "."); ?></td>
                    <td align="center"><?= number_format($transaksi['pembayaran'], 0, ",", "."); ?></td>
                    <td align="center">0</td>
                    <?php if ($this->session->flashdata('button') == "on") : ?>
                      <td align="center">
                        <a href="<?= base_url(); ?>marketing/editTransaksi/<?= $transaksi['id_transaksi']; ?>" class="btn btn-primary btn-sm">Ubah</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                      </td>
                    <?php endif; ?>
                  </tr>
              <?php $i++;
                endforeach;
              endif; ?>

            </tbody>
            <tfoot class="table-light">
              <tr>
                <?php if (isset($_POST['update'])) {
                  $ekor = $subtotal['ekor'];
                  $kg = $subtotal['kg'];
                  $harga = $subtotal['harga'];
                  $subJumlah = $subtotal['jumlah'];
                  $total = $subtotal['total'];
                  $pembayaran = $subtotal['pembayaran'];
                } else {
                  $ekor = 0;
                  $kg = 0;
                  $harga = 0;
                  $subJumlah = 0;
                  $total = 0;
                  $pembayaran = 0;
                  $subSaldo = 0;
                } ?>
                <td colspan="2">Subtotal</td>
                <td align="center"><?= $ekor; ?></td>
                <td align="center"><?= number_format($kg, 1, ",", "."); ?></td>
                <td align="center"><?= number_format($harga, 0, ",", "."); ?></td>
                <td align="center"><?= number_format($total, 0, ",", "."); ?></td>
                <td align="center"><?= number_format($pembayaran, 0, ",", "."); ?></td>
                <td align="center">0</td>
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Penambahan Transaksi Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url('marketing/tambahTransaksi') ?>" method="POST">
          <div class="modal-body">
            <table align="center" class="table">
              <tr>
                <td>Vendor</td>
                <td>
                  <select name="id_vendor" id="">
                    <option value="">Pilih Code - Nama</option>
                    <?php foreach ($dataVendor as $vendor) : ?>
                      <option value="<?= $vendor['id_vendor'] ?>"><?= $vendor['id_vendor']; ?> - <?= $vendor['nama_vendor']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Lokasi</td>
                <td>
                  <select name="id_kandang" id="">
                    <option value="">Pilih Lokasi</option>
                    <?php foreach ($dataKandang as $kandang) : ?>
                      <option value="<?= $kandang['id_pegawai'] ?>"><?= $kandang['nama_pegawai']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
              </tr>
              <tr align="center" class="table-dark">
                <td colspan="2">Transaksi Pembelian</td>
              </tr>
              <tr>
                <td>No. Surat</td>
                <td><input type="text" name="no_surat" min="0" placeholder="No. Surat"></td>
              </tr>
              <tr>
                <td>Jumlah (Ekor)</td>
                <td><input type="number" min="0" name="ekor" placeholder="Jumlah ayam (ekor)"></td>
              </tr>
              <tr>
                <td>Berat (Kg)</td>
                <td><input type="number" step="0.1" min="0" name="berat" placeholder="Berat total ayam (kg)"></td>
              </tr>
              <tr>
                <td>Harga (Rp.)</td>
                <td><input type="number" min="0" name="harga" placeholder="Harga ayam per kg"></td>
              </tr>
              <tr align="center" class="table-dark">
                <td colspan="2">Bagian Pembayaran</td>
              </tr>
              <tr>
                <td>Pembayaran (Rp.)</td>
                <td><input type="number" min="0" name="bayar" placeholder="Pembayaran dalam rupiah"></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah / Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Tutup Modal Tambah -->

  <!-- Modal Kandang -->
  <div class="modal fade" id="modalKandang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?= base_url('marketing/tambahKandang') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kandang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row g-2 align-items-center">
              <div class="col-2">
                <label for="" class="col-form-label">Nama</label>
              </div>
              <div class="col-auto">
                <input type="text" class="form-control" name="namaKandang">
              </div>
              <div class="w-100"></div>
              <div class="col-2">
                <label for="" class="col-form-label">No. Telp</label>
              </div>
              <div class="col-auto">
                <input type="text" class="form-control" name="telpKandang">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="reset" value="Batal" class="btn btn-danger" data-bs-dismiss="modal">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Tutup Modal Kandang -->

  <!-- Modal Vendor -->
  <div class="modal fade" id="modalVendor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?= base_url('marketing/tambahVendor') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Vendor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row g-2 align-items-center">
              <div class="col-2">
                <label for="" class="col-form-label">Nama</label>
              </div>
              <div class="col-auto">
                <input type="text" class="form-control" name="namaVendor">
              </div>
              <div class="w-100"></div>
              <div class="col-2">
                <label for="" class="col-form-label">Alamat</label>
              </div>
              <div class="col-auto">
                <input type="text" class="form-control" name="alamatVendor">
              </div>
              <div class="w-100"></div>
              <div class="col-2">
                <label for="" class="col-form-label">No. Telp</label>
              </div>
              <div class="col-auto">
                <input type="text" class="form-control" name="telpVendor">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="reset" value="Batal" class="btn btn-danger" data-bs-dismiss="modal">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Tutup Modal Vendor -->

</main>