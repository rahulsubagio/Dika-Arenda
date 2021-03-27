<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-secondary">Rekapitulasi Penyusutan Mingguan</h1>
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
          <h5>Bulan Ini : <?= date("M Y"); ?></h5>
        </div>
        <div class="col-md-3">
          <label for="inputEmail4" class="form-label">Pilih bulan</label>
          <input type="date" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-3">
          <h5>Minggu ke - 1</h5>
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
          <tr>
            <td align="center">1.</td>
            <td align="center">Senin</td>
            <td align="center">01/03/2021</td>
            <td align="center">1.035</td>
            <td align="center">1.221,5</td>
            <td align="center">892</td>
            <td align="center">923,7</td>
            <td align="center">1</td>
            <td align="center">1,1</td>
            <td align="center">2</td>
            <td align="center">2,5</td>
            <td align="center">0</td>
            <td align="center">0</td>
            <td align="center">502</td>
            <td align="center">521,5</td>
            <td align="center">497</td>
            <td align="center">816</td>
            <td align="center">-</td>
            <td align="center">3,4</td>
            <td align="center"></td>
            <td align="center">
              <a href="#" class="btn btn-primary btn-sm">Ubah</a>
              <a href="#" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
          <tr>
            <td align="center">1.</td>
            <td align="center">Senin</td>
            <td align="center">01/03/2021</td>
            <td align="center">1.035</td>
            <td align="center">1.221,5</td>
            <td align="center">892</td>
            <td align="center">923,7</td>
            <td align="center">1</td>
            <td align="center">1,1</td>
            <td align="center">2</td>
            <td align="center">2,5</td>
            <td align="center">0</td>
            <td align="center">0</td>
            <td align="center">502</td>
            <td align="center">521,5</td>
            <td align="center">497</td>
            <td align="center">816</td>
            <td align="center">-</td>
            <td align="center">3,4</td>
            <td align="center"></td>
            <td align="center">
              <a href="#" class="btn btn-primary btn-sm">Ubah</a>
              <a href="#" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
        </tbody>
        <tfoot class="table-light">
          <tr>
            <td colspan="3">Subtotal</td>
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
            <td align="center">831,1</td>
            <td align="center" colspan="4">
              <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
            </td>
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