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
      <form action="" class="row g-3">
        <div class="col-md-3">
          <h5>Bulan Ini : <?= date("M Y"); ?></h5>
        </div>
        <div class="col-md-9 row">
          <label class="col-form-label col-md-2">Pilih Bulan</label>
          <div class="col-md-3">
            <input type="month" class="form-control">
          </div>
          <label class="col-form-label col-md-2">Customer</label>
          <div class="col-md-3">
            <select class="form-select">
              <option selected>Code - Nama</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary">Cek &downdownarrows;</button>
          </div>
        </div>
        <div class="col-md-3">

        </div>
      </form>
      <br>
      <div class="row g-3">
        <div class="col-md-3">
          <h5>Customer : Rahul Subagio</h5>
        </div>
        <div class="col-md-3">
          <h5>Code : C12</h5>
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
          <tr>
            <td align="center">1.</td>
            <td>02/03/2021</td>
            <td align="center">4</td>
            <td align="center">5,1</td>
            <td align="center">21.000</td>
            <td align="center">107.100</td>
            <td align="center">107.100</td>
            <td align="center">Rp -102.000</td>
          </tr>
          <tr>
            <td align="center">2.</td>
            <td>04/03/2021</td>
            <td align="center">5</td>
            <td align="center">5,1</td>
            <td align="center">21.000</td>
            <td align="center">107.100</td>
            <td align="center">107.100</td>
            <td align="center">Rp -102.000</td>
          </tr>
        </tbody>
        <tfoot class="table-light">
          <tr>
            <td colspan="2">Subtotal</td>
            <td align="center">116</td>
            <td align="center">122,6</td>
            <td align="center">22.609</td>
            <td align="center">2.767.570</td>
            <td align="center">3.034.920</td>
            <td align="center">Rp -234.000</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</main>