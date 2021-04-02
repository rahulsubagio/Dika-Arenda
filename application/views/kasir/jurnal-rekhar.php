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
      <form action="" class="row g-3">
        <div class="col-md-3">
          <h5>Hari Ini : <?= date("d M Y"); ?></h5>
        </div>
        <div class="col-md-3">
          <label for="inputEmail4" class="form-label">Pilih bulan</label>
          <input type="date" class="form-control" id="inputEmail4">
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
          <tr>
            <td align="center">1.</td>
            <td>Rahul Subagio</td>
            <td align="center">C12</td>
            <td align="center">4</td>
            <td align="center">5,1</td>
            <td align="center">21.000</td>
            <td align="center">107.100</td>
            <td align="center">-</td>
            <td align="center">107.100</td>
            <td align="center">107.100</td>
            <?php if ($this->session->flashdata('button') == "on") : ?>
              <td align="center">
                <a href="#" class="btn btn-primary btn-sm">Ubah</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            <?php endif; ?>
          </tr>
          <tr>
            <td align="center">2.</td>
            <td>Budi Setiawan</td>
            <td align="center">C1</td>
            <td align="center">5</td>
            <td align="center">5,1</td>
            <td align="center">21.000</td>
            <td align="center">107.100</td>
            <td align="center">-</td>
            <td align="center">107.100</td>
            <td align="center">107.100</td>
            <?php if ($this->session->flashdata('button') == "on") : ?>
              <td align="center">
                <a href="#" class="btn btn-primary btn-sm">Ubah</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            <?php endif; ?>
          </tr>
        </tbody>
        <tfoot class="table-light">
          <tr>
            <td colspan="3">Subtotal</td>
            <td align="center">116</td>
            <td align="center">122,6</td>
            <td align="center">22.609</td>
            <td align="center">2.777.570</td>
            <td align="center">333</td>
            <td align="center">2.767.570</td>
            <td align="center">3.034.920</td>
            <?php if ($this->session->flashdata('button') == "on") : ?>
              <td align="center">
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
          <h5 class="modal-title" id="exampleModalLabel">Penambahan Transaksi Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="">
            <table align="center" class="table">
              <tr>
                <td>Code Customer</td>
                <td>
                  <select name="" id="">
                    <option value="">Pilih Code - Nama</option>
                    <option value="">C12 - Rahul Subagio</option>
                  </select>
                </td>
              </tr>
              <tr align="center" class="table-dark">
                <td colspan="2">Transaksi Pembelian</td>
              </tr>
              <tr>
                <td>Jumlah (Ekor)</td>
                <td><input type="text" placeholder="Jumlah ayam (ekor)"></td>
              </tr>
              <tr>
                <td>Berat (Kg)</td>
                <td><input type="text" placeholder="Berat total ayam (kg)"></td>
              </tr>
              <tr>
                <td>Harga (Rp.)</td>
                <td><input type="text" placeholder="Harga ayam per kg"></td>
              </tr>
              <tr>
                <td>Jumlah</td>
                <td>Bagian JS buat perhitungan langsungnya (Harga * Kg)</td>
              </tr>
              <tr>
                <td>a</td>
                <td><input type="text" placeholder="kompensasi per kg"></td>
              </tr>
              <tr>
                <td>Total</td>
                <td>Bagian JS buat perhitungan langsungnya (Jumlah - (a * Kg))</td>
              </tr>
              <tr align="center" class="table-dark">
                <td colspan="2">Bagian Pembayaran</td>
              </tr>
              <tr>
                <td>Pembayaran (Rp.)</td>
                <td><input type="text" placeholder="Pembayaran dalam rupiah"></td>
              </tr>
            </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Tambah / Simpan</button>
        </div>
      </div>
    </div>
  </div>
</main>