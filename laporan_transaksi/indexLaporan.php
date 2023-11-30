<?php
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

?>

<div class="card">
<div class="row mb-3">
  <div class="card-header col-md-4">
    <label for="month">Bulan:</label>
    <input class="form-control" type="month" value="2021-06" id="html5-month-input" />
    <h5 class="pb-1 mb-2"></h5>
    <button type="button" class="btn btn-icon btn-success">
        <span class="tf-icons bx bx-search"></span>
    </button>
    <div class="btn-group">
                              <button
                                class="btn btn-primary dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Download
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">PDF</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">EXCEL</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">PRINT</a></li>
                              </ul>
                            </div>
  </div>
  <div class="card-header col-md-4">
    <label for="year">Hari:</label>
    <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
    <h5 class="pb-1 mb-2"></h5>
    <button type="button" class="btn btn-icon btn-success">
        <span class="tf-icons bx bx-search"></span>
    </button>
    <div class="btn-group">
                              <button
                                class="btn btn-primary dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                              >
                                Download
                              </button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">PDF</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">EXCEL</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">PRINT</a></li>
                              </ul>
  </div>
  </div>
</div>
<!-- </div> -->


<!-- <div class="card"> -->
                <h5 class="card-header">Laporan Penjualan</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No Transaksi</th>
                        <th>Nama Kasir</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Modal</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong></strong></td>
                        <td></td>
                        <!-- <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td> -->
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

<?php
$content = ob_get_clean();
include "../admin/body.php";
?>