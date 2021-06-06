<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary">Rekapitulasi Penjualan Ayam</h1>
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
        <form action="<?= base_url() ?>/kasir/rekapPenjualan" method="POST" class="row g-3">
        <?php else : ?>
          <form action="<?= base_url() ?>/pimpinan/rekapPenjualanKasir" method="POST" class="row g-3">
          <?php endif; ?>
          <div class="col-md-3">
            <?php if (isset($_POST['update'])) : ?>
              <h5>Bulan terpilih : <?= $bulan; ?></h5>
            <?php else : ?>
              <h5>Bulan Ini : <?= date("M Y"); ?></h5>
            <?php endif; ?>
          </div>
          <div class="col-md-9 row">
            <label class="col-form-label col-md-2">Pilih Bulan</label>
            <div class="col-md-5">
              <input type="month" class="form-control" name="bulan">
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary" name="update">Cek &downdownarrows;</button>
            </div>
          </div>
          </form>
          <br>
          <table class="table table-hover">
            <thead class="table-light">
              <tr align="center">
                <th rowspan="2">No.</th>
                <th rowspan="2">Tanggal</th>
                <th colspan="2">Jumlah</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>a</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Neraca</th>
              </tr>
              <tr align="center">
                <th>Ekor</th>
                <th>Kg</th>
                <th>Rp</th>
                <th>Rp</th>
                <th>Rp</th>
                <th>Rp</th>
                <th>Rp</th>
                <th>Rp</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($rekap as $r) : ?>
                <tr>
                  <td align="center"><?= $i; ?></td>
                  <td><?= $r['tanggal']; ?></td>
                  <td align="center"><?= $r['ekor']; ?></td>
                  <td align="center"><?= number_format($r['kg'], 1, ",", "."); ?></td>
                  <td align="center"><?= number_format($r['harga'], 0, ",", "."); ?></td>
                  <td align="center"><?= number_format($r['jumlah'], 0, ",", "."); ?></td>
                  <td align="center"><?= number_format($r['a'], 0, ",", "."); ?></td>
                  <td align="center"><?= number_format($r['total'], 0, ",", "."); ?></td>
                  <td align="center"><?= number_format($r['pembayaran'], 0, ",", "."); ?></td>
                  <td align="center"><?= number_format($r['neraca'], 0, ",", "."); ?></td>
                </tr>
              <?php $i++;
              endforeach;
              ?>
            </tbody>
            <tfoot class="table-light">
              <tr>
                <td colspan="2">Subtotal</td>
                <td align="center"><?= $subtotal['ekor']; ?></td>
                <td align="center"><?= number_format($subtotal['kg'], 1, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['harga'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['jumlah'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['a'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['total'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['pembayaran'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($subtotal['neraca'], 0, ",", "."); ?></td>
              </tr>
            </tfoot>
          </table>
    </div>
  </div>
</main>