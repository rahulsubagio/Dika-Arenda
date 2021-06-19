<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary">Leger Customer</h1>
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
      <?php if ($this->session->flashdata('base') == "marketing") : ?>
        <form action="<?= base_url() ?>marketing/legerPembelian/" method="POST" class="row g-3">
        <?php else : ?>
          <form action="<?= base_url() ?>/pimpinan/legerPembelian" method="POST" class="row g-3">
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
            <div class="col-md-3">
              <input type="month" class="form-control" required name="bulan" max="<?= date("Y-m"); ?>">
            </div>
            <label class="col-form-label col-md-2">Vendor</label>
            <div class="col-md-3">
              <select name="id_vendor" required class="form-select">
                <option selected>Pilih Code - Nama</option>
                <?php foreach ($dataVendor as $vendor) : ?>
                  <option value="<?= $vendor['id_vendor'] ?>"><?= $vendor['id_vendor']; ?> - <?= $vendor['nama_vendor']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary" name="update">Cek &downdownarrows;</button>
            </div>
          </div>
          </form>
          <br>
          <div class="row g-3">
            <?php
            if (isset($_POST['update'])) {
              // foreach ($dataTransaksi as $transaksi) :
              //   $namaV  = $transaksi['nama_vendor'];
              //   $idV    = $transaksi['id_vendor'];
              // endforeach;
              $namaV  = $dVendor['nama_vendor'];
              $idV    = $dVendor['id_vendor'];
            } else {
              $namaV  = "Silahkan Pilih";
              $idV    = "-";
            }
            ?>
            <div class="col-md-3">
              <h5>Vendor : <?= $namaV; ?></h5>
            </div>
            <div class="col-md-3">
              <h5>Code : <?= $idV; ?></h5>
            </div>
          </div>
          <br>
          <table class="table table-hover">
            <thead class="table-light">
              <tr align="center">
                <th>No.</th>
                <th>Tanggal</th>
                <th>Ekor</th>
                <th>Kg</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Saldo</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              if (isset($_POST['update'])) :
                foreach ($dataTransaksi as $transaksi) : ?>
                  <tr>
                    <td align="center"><?= $i; ?>.</td>
                    <td align="center"><?= $transaksi['tanggal']; ?></td>
                    <td align="center"><?= $transaksi['ekor']; ?></td>
                    <td align="center"><?= number_format($transaksi['kg'], 1, ",", "."); ?></td>
                    <td align="center"><?= number_format($transaksi['harga'], 0, ",", "."); ?></td>
                    <td align="center"><?= number_format($transaksi['total'], 0, ",", "."); ?></td>
                    <td align="center"><?= number_format($transaksi['pembayaran'], 0, ",", "."); ?></td>
                    <td align="center">0</td>
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
              </tr>
            </tfoot>
          </table>
    </div>
  </div>
</main>