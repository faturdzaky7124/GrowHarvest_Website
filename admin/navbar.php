<?php
  $username = $_SESSION["nama_pengguna"];
  $query = mysqli_query($con, "SELECT * FROM tb_akun WHERE nama_pengguna='$username'");
  $row = mysqli_fetch_assoc($query);
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
        .clock {
            font-size: 24px;
            font-weight: bold;
        }
    </style>


<nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                <div id="clock" class="clock"></div>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                <span class="fw-semibold d-block">
                              <?php if(isset($_SESSION["nama_pengguna"])) {
                                $username = $_SESSION["nama_pengguna"];
                                echo "Halo, $username!";
                                } else {
                                    // Tindakan yang perlu diambil jika pengguna belum login
                                } ?></span>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?php echo $row["gambar"]?>" alt class="w-px-40 h-40 rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?php echo $row["gambar"]?>" alt class="w-px-40 h-40 rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">
                              <?php if(isset($_SESSION["nama_pengguna"])) {
                                $username = $_SESSION["nama_pengguna"];
                                echo "Halo, $username!";
                                } else {
                                    // Tindakan yang perlu diambil jika pengguna belum login
                                } ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../akun/profilku.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <button class="dropdown-item" onclick="konfirmasiLogout()" >
                      <!-- <a class="dropdown-item" href="../admin/logout.php"> -->
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                        </button>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>



          <script>
        function konfirmasiLogout() {
            // Tampilkan alert konfirmasi menggunakan SweetAlert2
            Swal.fire({
              title: "Konfirmasi Logout",
                text: 'Apakah Anda yakin ingin logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout'
            }).then((result) => {
                // Jika pengguna mengklik "Ya, Logout", arahkan ke logout.php
                if (result.isConfirmed) {
                    window.location.href = "../admin/logout.php";
                }
                // Jika pengguna mengklik "Batal", tidak ada tindakan
            });
        }
    </script>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // Format the time to have leading zeros if needed
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            // Display the time in the "clock" div
            document.getElementById('clock').innerText = hours + ':' + minutes + ':' + seconds;

            // Update the clock every 1 second
            setTimeout(updateClock, 1000);
        }

        // Initial call to display the clock
        updateClock();
    </script>
