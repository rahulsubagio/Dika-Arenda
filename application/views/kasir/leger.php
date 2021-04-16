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
      <form action="<?= base_url() ?>/kasir/leger" method="POST" class="row g-3">
        <div class="col-md-3">
          <?php if (isset($_POST['update'])) : ?>
            <h5>Bulan terpilih : <?= $bulan; ?></h5>
          <?php else : ?>
            <h5>Bulan Ini : <?= date("M Y"); ?></h5>
          <?php endif; ?>
        </div>
        <div class="col-md-9 row">
          <label class="col-form-label col-md-2">Pilih Bulan</label>
          <div class="col-md-3">
            <input type="month" class="form-control" required name="bulan">
          </div>
          <label class="col-form-label col-md-2">Customer</label>
          <div class="col-md-3">
            <select class="form-select" required name="customer">
              <option selected>Code - Nama</option>
              <?php foreach ($daftar_customer as $c) : ?>
                <option value="<?= $c['code']; ?>"><?= $c['code']; ?> - <?= $c['nama_customer']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary" name="update">Cek &downdownarrows;</button>
          </div>
        </div>
        <div class="col-md-3">
        </div>
      </form>
      <br>
      <div class="row g-3">
        <?php
        if (isset($_POST['update'])) {
          $nama = $customer['nama_customer'];
          $code = $customer['code'];
          $awal = $customer['saldo_awal'];
          $akhir = $customer['saldo_akhir'];
        } else {
          $nama = "silahkan pilih";
          $code = "-";
          $awal = 0;
          $akhir = 0;
        }
        ?>
        <div class="col-md-3">
          <h5>Customer : <?= $nama; ?></h5>
        </div>
        <div class="col-md-3">
          <h5>Code : <?= $code; ?></h5>
        </div>
        <div class="col-md-3">
          <h5>Saldo Awal : Rp <?= number_format($awal, 0, ",", "."); ?></h5>
        </div>
        <div class="col-md-3">
          <h5>Saldo Akhir : Rp <?= number_format($akhir, 0, ",", "."); ?></h5>
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
            <th>Jumlah</th>
            <th>a</th>
            <th>Total</th>
            <th>Pembayaran</th>
            <th>Saldo</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_POST['update'])) :
            $i = 1;
            $subSaldo = 0;
            foreach ($transaksi as $t) :
              $kg = floatval($t['kg']);
              $harga = intval($t['harga']);
              $jumlah = $kg * $harga;
              $total = intval($t['total']);
              $pembayaran = intval($t['pembayaran']);
              $subSaldo = $subSaldo + $pembayaran - $total;
              $saldo = $pembayaran - $total;
              $dataTgl = strtotime($t['tanggal']);
              $tgl = date("d-m-Y", $dataTgl);
          ?>
              <tr>
                <td align="center"><?= $i; ?>.</td>
                <td><?= $tgl; ?></td>
                <td align="center"><?= $t['ekor']; ?></td>
                <td align="center"><?= number_format($t['kg'], 1, ",", "."); ?></td>
                <td align="center"><?= number_format($t['harga'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($jumlah, 0, ",", "."); ?></td>
                <td align="center"><?= number_format($t['a_kompensasi'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($t['total'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($t['pembayaran'], 0, ",", "."); ?></td>
                <td align="center"><?= number_format($saldo, 0, ",", "."); ?></td>
              </tr>
          <?php
              $i++;
            endforeach;
          endif;
          ?>
        </tbody>
        <tfoot class="table-light">
          <?php
          if (isset($_POST['update'])) {
            $ekor = $subtotal['ekor'];
            $kg = floatval($subtotal['kg']);
            $harga = intval($subtotal['harga']);
            $subJumlah = $kg * $harga;
            $a = $subtotal['a'];
            $total = $subtotal['total'];
            $pembayaran = $subtotal['pembayaran'];
            
          } else {
            $ekor = 0;
            $kg = 0;
            $harga = 0;
            $subJumlah = 0;
            $a = 0;
            $total = 0;
            $pembayaran = 0;
            $subSaldo = 0;
          }
          ?>

          <tr>
            <td colspan="2">Subtotal</td>
            <td align="center"><?= $ekor; ?></td>
            <td align="center"><?= number_format($kg, 1, ",", "."); ?></td>
            <td align="center"><?= number_format($harga, 3, ",", "."); ?></td>
            <td align="center"><?= number_format($subJumlah, 0, ",", "."); ?></td>
            <?php
            if ($a == NULL) {
              $a = 0;
            }
            ?>
            <td align="center"><?= number_format($a, 2, ",", "."); ?></td>
            <td align="center"><?= number_format($total, 0, ",", "."); ?></td>
            <td align="center"><?= number_format($pembayaran, 0, ",", "."); ?></td>
            <td align="center"><?= number_format($subSaldo, 0, ",", "."); ?></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</main>