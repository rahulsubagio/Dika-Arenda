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
      <form action="#" class="row g-3">
        <div class="col-md-3">
          <h5>Bulan Ini : <?= date("M Y"); ?></h5>
        </div>
        <div class="col-md-9 row">
          <label class="col-form-label col-md-2">Pilih Bulan</label>
          <div class="col-md-5">
            <input type="week" class="form-control">
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary">Cek &downdownarrows;</button>
          </div>
        </div>
      </form>
      <br>
      <div class="table-responsive" style="overflow-y: scroll;">
        <table class="table table-hover table-bordered" style="table-layout: auto;">
          <thead class="table-light table-striped">
            <tr align="center">
              <th rowspan="4">No.</th>
              <th rowspan="4">Tanggal</th>
              <th rowspan="2" colspan="3" class="table-success">PEMBELIAN</th>
              <th rowspan="2" colspan="3" class="table-primary">PENJUALAN</th>
              <th colspan="8" class="table-warning">STOK</th>
              <th rowspan="2" colspan="5" class="table-danger">PENYUSUTAN</th>
            </tr>
            <tr align="center">
              <th colspan="4">ADMINISTRASI</th>
              <th colspan="4" class="table-info">RIIL</th>
            </tr>
            <tr align="center">
              <th colspan="2">Jumlah</th>
              <th>Harga</th>
              <th colspan="2">Jumlah</th>
              <th>Harga</th>
              <th colspan="2">AWAL</th>
              <th colspan="2">AKHIR</th>
              <th colspan="2" class="table-info">AYAM HIDUP</th>
              <th colspan="2" class="table-info">AYAM MATI</th>
              <th colspan="2">Jumlah</th>
              <th>Harga</th>
              <th colspan="2">Jumlah</th>
            </tr>
            <tr align="center">
              <th>Ekor</th>
              <th>Kg</th>
              <th>Rp</th>

              <th>Ekor</th>
              <th>Kg</th>
              <th>Rp</th>

              <th>Ekor</th>
              <th>Kg</th>
              <th>Ekor</th>
              <th>Kg</th>

              <th class="table-info">Ekor</th>
              <th class="table-info">Kg</th>
              <th class="table-info">Ekor</th>
              <th class="table-info">Kg</th>

              <th>Ekor</th>
              <th>Kg</th>

              <th>Rp</th>
              <th>Rp</th>
              <th>%</th>
            </tr>
          </thead>
          <div>
            <tbody>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
              <tr>
                <td align="center">1.</td>
                <td align="center">01/03/2021</td>

                <td align="center" class="table-success">1.035</td>
                <td align="center" class="table-success">1.221,5</td>
                <td align="center" class="table-success">12.000</td>

                <td align="center" class="table-primary">892</td>
                <td align="center" class="table-primary">923,7</td>
                <td align="center" class="table-primary">22.576</td>

                <td align="center" class="table-warning">6.042</td>
                <td align="center" class="table-warning">12.123,3</td>
                <td align="center" class="table-warning">6.009</td>
                <td align="center" class="table-warning">11.364,2</td>

                <td align="center">623</td>
                <td align="center">821,2</td>
                <td align="center">15</td>
                <td align="center">16,5</td>

                <td align="center">6.009</td>
                <td align="center">11.364,2</td>
                <td align="center">22.576</td>
                <td align="center">22.576</td>
                <td align="center">102,7</td>

              </tr>
            </tbody>
          </div>
          <tfoot class="table-light">
            <tr>
              <td colspan="2">Subtotal</td>
              <td align="center">41.035</td>
              <td align="center">71.221,5</td>
              <td align="center">12.000</td>

              <td align="center">39.892</td>
              <td align="center">68.923,7</td>
              <td align="center">22.576</td>

              <td align="center">146.042</td>
              <td align="center">212.123,3</td>
              <td align="center">156.009</td>
              <td align="center">211.364,2</td>

              <td align="center">623</td>
              <td align="center">821,2</td>
              <td align="center">125</td>
              <td align="center">136,5</td>

              <td align="center">6.009</td>
              <td align="center">111.364,2</td>
              <td align="center">22.576</td>
              <td align="center">22.576</td>
              <td align="center">102,7</td>

            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

</main>