<?php 
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

    // $query= " SELECT * FROM tb_akun ORDER BY id_akun ASC ";
    // $sql= mysqli_query($con,$query);
    // $no = 0;

    if (!isset($_SESSION['nama_pengguna'])) {
        header("Location: ../admin/login.php");
        exit(); 
    }

?>

<div class="pagetitle">
      <h1>Profile</h1>
      
      
    </div><!-- End Page Title -->
<section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo $_SESSION["gambar"]; ?>" alt="Profile" class="rounded-circle" width="150" height="150">
              <h2> <?php echo $_SESSION["nama_pengguna"]; ?></h2>
              <h3><?php echo $_SESSION["tingkat_akses"]; ?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <h5 class="pb-1 mb-4"></h5>
          <a href="../admin/index.php" type="button" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>
                
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["nama_pengguna"]; ?></div>
                  </div>
                  <h5 class="pb-1 mb-1"></h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["nama_lengkap"]; ?></div>
                  </div>
                  <h5 class="pb-1 mb-1"></h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No Hp</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["no_hp"]; ?></div>
                  </div>
                  <h5 class="pb-1 mb-1"></h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["alamat"]; ?></div>
                  </div>
                  <h5 class="pb-1 mb-1"></h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Peran</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["tingkat_akses"]; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?php echo $_SESSION["gambar"]; ?>" alt="user-avatar"
							class="d-block w-px-100 h-px-100 rounded"
							name="uploadedAvatar"
							id="uploadedAvatar">
                        <div class="pt-2">
                          <label for="uploadubahgambar" class="btn btn-success btn-sm" tabindex="0">
                            <i class="bx bx-upload"></i>
                            <input
                              type="file"
                              id="uploadubahgambar"
                              name="uploadubahgambar"
                              class="account-file-input"
                              hidden
                              accept="image/*"
                            />
                          </label>
                          <a href="#" class="" title="Remove my profile image"><i class=""></i></a>
                          <button type="button" class="btn btn-danger account-image-reset btn-sm">
                            <i class="bx bx-trash"></i>
                            <span class="d-none d-sm-block"></span>
                          </button>
                        </div>
                      </div>
                    </div>

                    <input name="fullName" type="hidden" class="form-control" id="fullName" value="<?php echo $_SESSION["id_akun"]; ?>">
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $_SESSION["nama_pengguna"]; ?>">
                      </div>
                    </div>

                    <!-- <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                      </div>
                    </div> -->

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?php echo $_SESSION["nama_lengkap"]; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">No Hp</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="<?php echo $_SESSION["no_hp"]; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="<?php echo $_SESSION["alamat"]; ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-success">Simpan Profile</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-success">Ubah Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>


<?php 
    $content = ob_get_clean();
    include "../admin/body.php";       
?>
  <link href="../assets/testing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <script>

function validateInput(inputElement) {
      const inputValue = inputElement.value;
      const forbiddenCharacters = /[@1234567890!#^&*]/g; // Karakter yang tidak diinginkan

      if (forbiddenCharacters.test(inputValue)) {
        document.getElementById('error-message').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, angka, atau karakter lainnya.';
        inputElement.value = inputValue.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
      } else {
        document.getElementById('error-message').textContent = '';
      }
    }


document.addEventListener('DOMContentLoaded', function () {
  (function () {
    // Update/reset user image on the account page
    const accountUserImage = document.getElementById('uploadedAvatar');
    const fileInput = document.querySelector('.account-file-input');
    const resetFileInput = document.querySelector('.account-image-reset');

    if (accountUserImage) {
      const resetImage = accountUserImage.src;

      fileInput.onchange = () => {
        if (fileInput.files[0]) {
          accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
        }
      };

      resetFileInput.onclick = () => {
        fileInput.value = '';
        accountUserImage.src = resetImage;
      };
    }
  })();
});

</script>