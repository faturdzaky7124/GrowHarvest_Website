<?php
session_start();
require "../function/koneksi.php";


if (isset($_POST["btnlogin"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Use parameterized statements to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM tb_akun WHERE nama_pengguna=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["kata_sandi"])) {

            $id_admin = $row["id_akun"];
            date_default_timezone_set('Asia/Jakarta');

            $log_sql = $con->prepare("INSERT INTO tb_riwayat (id_akun, waktu_login, id_riwayat) VALUES (?, ?, ?)");
            $new_id_catatan = generateNewIdCatatan($con);
            $login_time = date("Y-m-d H:i:s");
            $log_sql->bind_param("sss", $id_admin, $login_time, $new_id_catatan);
            $log_sql->execute();

            $_SESSION["id_akun"] = $row["id_akun"];
            $_SESSION["nama_pengguna"] = $row["nama_pengguna"];
            $_SESSION["nama_lengkap"] = $row["nama_lengkap"];
            $_SESSION["kata_sandi"] = $row["kata_sandi"];
            $_SESSION["no_hp"] = $row["no_hp"];
            $_SESSION["alamat"] = $row["alamat"];
            $_SESSION["gambar"] = $row["gambar"];
            $_SESSION["tingkat_akses"] = $row["tingkat_akses"];
            switch ($row["tingkat_akses"]) {
              case "admin":
                header("location:../admin/index.php");
                  break;
              case "pegawai":
                header("location:../admin/index.php");
                    // exit();
                    break;
            }
        }
        else {
          
      }
    } else {
      
  }
}

function generateNewIdCatatan($con)
{
    $query = $con->query("SELECT MAX(id_riwayat) AS max_id FROM tb_riwayat");
    $rows = $query->fetch_assoc();
    $max_id = $rows['max_id'];
    $numeric_part = (int) substr($max_id, 2);
    $numeric_part++;
    return 'LG' . str_pad($numeric_part, 3, '0', STR_PAD_LEFT);
}
?> 


<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Rajawali</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/backgrounds/wali.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    <style>
  .cont {
    /* background-color: #f0f0f0;  */
    /* or */
    background-image: url('../assets/landingpage/images/bg_3.jpg');
    background-size: cover;
    background-repeat: no-repeat;
  }
</style>

  </head>

  <body>
    
    <!-- Content -->

    <div class="cont">
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="../assets/img/backgrounds/raja.jpg" alt="" class="d-block rounded" height="60" width="60">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2 bg-menu-theme">Harvest</span>
            </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome to Harvest! 👋</h4>
              <p class="mb-4">Please sign-in to your account and start the adventure</p>

              <form id="formAuthentication" class="mb-3" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    required
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <!-- <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a> -->
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      required
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <!-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div> -->
                <div class="mb-3">
                  <button class="btn btn-success d-grid w-100" type="submit"  name="btnlogin" >Masuk</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
