<?php
  $page = basename($_SERVER["REQUEST_URI"]);
?>

<style>
.ss::after{
background-color: #081226;
}
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  
          <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="../assets/img/backgrounds/raja.jpg" alt="" class="d-block rounded" height="60" width="60">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Harvest</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Fitur</span>
            </li>
            <li class="menu-item ss <?php echo ($page === 'index.php') ? 'active' : ''; ?>">
              <a href="../admin/index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item <?php echo ($page === 'indexAkun.php') ? 'active' : ''; ?>">
              <a href="../akun/indexAkun.php" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-user-account"></i>
                <div data-i18n="Analytics">Data Akun</div>
              </a>
            </li>
            <li class="menu-item <?php echo ($page === 'indexKategori.php') ? 'active' : ''; ?>">
              <a href="../kategori/indexKategori.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-category"></i>
                <div data-i18n="Analytics">Kategori</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-book-content "></i>
                <div data-i18n="Account Settings">Data Produk</div>
              </a>
              <ul class="menu-sub">
                  <li class="menu-item <?php echo ($page === 'indexProduk.php') ? 'active' : ''; ?>">
                  <a href="../produk/indexProduk.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-package"></i>
                    <div data-i18n="Analytics">Produk</div>
                  </a>
                </li>
                    <li class="menu-item <?php echo ($page === 'listProduk.php') ? 'active' : ''; ?>">
                  <a href="../produk/listProduk.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-dock-top"></i>
                    <div data-i18n="Analytics">List Produk</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item <?php echo ($page === 'indexLaporan.php') ? 'active' : ''; ?>">
              <a href="../laporan_transaksi/indexLaporan.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-receipt"></i>
                <div data-i18n="Analytics">laporan Penjualan</div>
              </a>
            </li>
          </ul>
        </aside>
