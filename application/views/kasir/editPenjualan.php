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
      <form action="<?= base_url(); ?>kasir/editTransaksi/<?= $transaksi['id_penjualan']; ?>" method="POST">
        <table class="table table-hover" align="center">
          <input type="hidden" name="id" value="<?= $transaksi['id_penjualan']; ?>">
          <input type="hidden" name="code" value="<?= $transaksi['code']; ?>">
          <input type="hidden" name="tanggal" value="<?= $transaksi['tanggal']; ?>"
          <thead align="center" class="table-dark">
            <th colspan="2">Customer</th>
          </thead>
          <tr>
            <td>Code Customer</td>
            <td>
              <fieldset disabled="disabled">
                <select name="customer">
                  <option value=""><?= $transaksi['code'] ?> - <?= $transaksi['nama_customer'] ?></option>
                </select>
              </fieldset>
            </td>
          </tr>
          <thead align="center" class="table-dark">
            <th colspan="2">Bagian Penjualan</th>
          </thead>
          <tr>
            <td>Jumlah (Ekor)</td>
            <td><input name="ekor" type="number" min="0" value="<?= $transaksi['ekor'] ?>" placeholder="Jumlah ayam (ekor)" required></td>
          </tr>
          <tr>
            <td>Berat (Kg)</td>
            <td><input name="kg" type="text" min="0" value="<?= $transaksi['kg'] ?>" placeholder="Berat total ayam (kg)" required></td>
          </tr>
          <tr>
            <td>Harga (Rp.)</td>
            <td><input name="harga" type="number" min="0" value="<?= $transaksi['harga'] ?>" placeholder="Harga ayam per kg" required></td>
          </tr>
          <tr>
            <td>Jumlah</td>
            <td>
              <fieldset disabled="disabled">
                <input type="number" value="<?= $transaksi['jumlah'] ?>">
              </fieldset>
              Bagian JS buat perhitungan langsungnya (Harga * Kg)
            </td>
          </tr>
          <tr>
            <td>a</td>
            <td><input name="a" type="number" min="0" value="<?= $transaksi['a_kompensasi'] ?>" placeholder="kompensasi per kg" required></td>
          </tr>
          <tr>
            <td>Total</td>
            <td>
              <fieldset disabled="disabled">
                <input type="number" value="<?= $transaksi['total'] ?>">
              </fieldset>
              Bagian JS buat perhitungan langsungnya (Jumlah - (a * Kg))
            </td>
          </tr>
          <thead class="table-dark" align="center">
            <th colspan="2">Bagian Pembayaran</th>
          </thead>
          <tr>
            <td>Pembayaran (Rp.)</td>
            <td><input name="pembayaran" type="number" min="0" value="<?= $transaksi['pembayaran'] ?>" placeholder="Pembayaran dalam rupiah" required></td>
          </tr>
          <tr align="center">
            <td colspan="2"><button type="submit" name="update" class="btn btn-success col-6">Simpan</button></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</main>