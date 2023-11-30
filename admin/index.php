<?php
  ob_start();
  require "../function/session.php";
  require "../function/koneksi.php";
  
    $query= " SELECT COUNT(*) as totalakun FROM tb_akun ";
    $sql= mysqli_query($con,$query);

    $query= " SELECT COUNT(*) as totalkategori FROM tb_kategori ";
    $konek= mysqli_query($con,$query);

    $query= " SELECT COUNT(*) as totalproduk FROM tb_produk ";
    $koneksi= mysqli_query($con,$query);

    $query = "SELECT tb_akun.nama_pengguna, tb_akun.gambar, tb_akun.tingkat_akses, tb_riwayat.waktu_login
        FROM tb_riwayat
        INNER JOIN tb_akun ON tb_riwayat.id_akun = tb_akun.id_akun
        ORDER BY tb_riwayat.waktu_login DESC";  
    $login = mysqli_query($con, $query);
  

?>


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">


                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="bg-label-success rounded-pill text-nowrap mb-2">Data Akun</h5>
                                <!-- <span class="badge bg-label-warning rounded-pill">Year 2021</span> -->
                              </div>
                              <?php foreach ($sql as $jumlahakun): ?>
                              <div class="mt-sm-auto">
                                <h3 class="mb-0"><?= $jumlahakun["totalakun"];?></h3>
                              </div>
                              <?php endforeach ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="bg-label-success rounded-pill text-nowrap mb-2">Data Kategori</h5>
                                <!-- <span class="badge bg-label-warning rounded-pill">Year 2021</span> -->
                              </div>
                              <?php foreach ($konek as $jumlahkategori): ?>
                              <div class="mt-sm-auto">
                                <h3 class="mb-0"><?= $jumlahkategori["totalkategori"];?></h3>
                              </div>
                              <?php endforeach ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="bg-label-success rounded-pill text-nowrap mb-2">Data Produk</h5>
                                <!-- <span class="badge bg-label-warning rounded-pill">Year 2021</span> -->
                              </div>
                              <?php foreach ($koneksi as $jumlahproduk): ?>
                              <div class="mt-sm-auto">
                                <h3 class="mb-0"><?= $jumlahproduk["totalproduk"];?></h3>
                              </div>
                              <?php endforeach ?>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Catatan Login</h5>
                    </div>
                    <div class="card-body" style="overflow-y: auto; max-height: 300px;">
                      <ul class="p-0 m-0">
                        <?php foreach ($login as $catatan): ?>
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="<?= $catatan["gambar"];?>" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1"><?= $catatan["nama_pengguna"];?></small>
                                <h6 class="mb-0"><?= $catatan["tingkat_akses"];?></h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0"><?= $catatan["waktu_login"];?></h6>
                              </div>
                            </div>
                          </li>
                        <?php endforeach ?>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Order Statistics</h5>
                        <small class="text-muted">42.82k Total Sales</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="orederStatistics"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                          <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h2 class="mb-2">8,258</h2>
                          <span>Total Orders</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                      </div>
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"
                              ><i class="bx bx-mobile-alt"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Electronic</h6>
                              <small class="text-muted">Mobile, Earbuds, TV</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">82.5k</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Fashion</h6>
                              <small class="text-muted">T-shirt, Jeans, Shoes</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">23.8k</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Decor</h6>
                              <small class="text-muted">Fine Art, Dining</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">849k</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"
                              ><i class="bx bx-football"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Sports</h6>
                              <small class="text-muted">Football, Cricket Kit</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">99</small>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->

<?php
  $content = ob_get_clean();
  include "body.php";

?>