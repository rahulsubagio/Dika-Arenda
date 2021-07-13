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
      <form action="<?= base_url(); ?>marketing/editTransaksi/<?= $transaksi['id_transaksi']; ?>" method="POST">
        <table class="table table-hover" align="center">
          <input type="hidden" name="id" value="<?= $transaksi['id_transaksi']; ?>">
          <input type="hidden" name="id_vendor" value="<?= $transaksi['id_vendor']; ?>">
          <input type="hidden" name="id_pegawai" value="<?= $transaksi['id_pegawai']; ?>">
          <input type="hidden" name="tanggal" value="<?= $transaksi['tanggal']; ?>" <thead align="center" class="table-dark">
          <th colspan="2">Vendor</th>
          </thead>
          <tr>
            <td>Code Vendor</td>
            <td>
              <fieldset disabled="disabled">
                <select name="customer">
                  <option value="<?= $transaksi['id_vendor'] ?>"><?= $transaksi['id_vendor'] ?> - <?= $transaksi['nama_vendor'] ?></option>
                </select>
              </fieldset>
            </td>
          </tr>
          <tr>
            <td>Code Kandang</td>
            <td>
              <fieldset disabled="disabled">
                <select name="kandang">
                  <option value="<?= $transaksi['id_pegawai'] ?>"><?= $transaksi['id_pegawai'] ?> - <?= $transaksi['nama_pegawai'] ?></option>
                </select>
              </fieldset>
            </td>
          </tr>
          <thead align="center" class="table-dark">
            <th colspan="2">Bagian Penjualan</th>
          </thead>
          <tr>
            <td>No. Surat</td>
            <td><input name="no_surat" type="text" min="0" value="<?= $transaksi['no_surat'] ?>" placeholder="Jumlah ayam (ekor)" required></td>
          </tr>
          <tr>
            <td>Jumlah (Ekor)</td>
            <td><input name="ekor" type="number" min="0" value="<?= $transaksi['ekor'] ?>" placeholder="Jumlah ayam (ekor)" required></td>
          </tr>
          <tr>
            <td>Berat (Kg)</td>
            <td><input name="berat" type="text" min="0" value="<?= $transaksi['kg'] ?>" placeholder="Berat total ayam (kg)" required></td>
          </tr>
          <tr>
            <td>Harga (Rp.)</td>
            <td><input name="harga" type="number" min="0" value="<?= $transaksi['harga'] ?>" placeholder="Harga ayam per kg" required></td>
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
        <!-- <?= var_dump($transaksi); ?> -->
      </form>
    </div>
  </div>
</main>