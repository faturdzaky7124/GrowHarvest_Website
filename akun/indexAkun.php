<?php 
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

    $query= " SELECT * FROM admin ORDER BY id_admin ASC ";
    $sql= mysqli_query($con,$query);
    $no = 0;

      if ($_SESSION["tingkat_akses"] !== "admin") {
        header("location: ../admin/index.php"); 
      }

?>

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Akun /</span> Akun</h4>

    <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-header fw-bold">Manajement Akun</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#largeModal"  name="btntambahakun" id="btntambahakun">Tambah Akun</button>
                </div>

                
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <!-- <th>Gambar</th> -->
                          <th>Nama</th>
                          <th>Nama Lengkap</th>
                          <th>Alamat</th>
                          <th>role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($sql as $data): ?>
                        <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> <?php echo ++$no?> </strong>
                          </td>
                          <!-- <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                              <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                              >
                                <img src="../assets/img/avatars/<?php echo $data["gambar"]?>" alt="Avatar" class="rounded-circle" />
                              </li>
                            </ul>
                          </td> -->
                          <td><?php echo $data["nama_pengguna"]?></td>
                          <td><?php echo $data["nama_lengkap"]?></td>
                          
                          <td><?php echo $data["alamat"]?></td>
                          <td><span class="badge bg-label-success me-1"><?php echo $data["tingkat_akses"]?></span></td>
                          <td>
                          <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#largedetail<?= $data["id_admin"];?>" name="btndetailakun" id="btndetailakun"
                                  ><i class="bx bx-edit-alt me-1"></i> Details</a>
                                <a class="dropdown-item" href="edit.php?id_admin=<?= $data["id_admin"];?>"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="delete.php?id=<?php echo $data['id_admin']; ?>"
                                  ><i class="bx bx-trash me-1"></i> Delete</a>
                              </div>
                            </div>
                          </td>
                        </tr>

                        <!-- FORM DETAIL -->
                        
                        <div class="modal fade" id="largedetail<?= $data["id_admin"];?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel3">Detail Akun</h5>
                                          <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                          ></button>
                                        </div>
                                        <hr class="my-0" />
                                        <form id="formAccountDeactivation" action="" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                          
                                          <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img
                                              src="../assets/img/avatars/<?= $data["gambar"] ?>"
                                              alt="user-avatar"
                                              class="d-block rounded"
                                              height="100"
                                              width="100"
                                              id="uploadedAvatar"
                                            />
                                          </div>
                                        </div>
                                        <hr class="my-0" />
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="col mb-3">
                                              <label for="namaedit" class="form-label">Nama Lengkap</label>
                                              <input type="text" readonly id="namaedit" class="form-control" value="<?= $data["nama_lengkap"] ?>"  />
                                            </div>
                                          </div>
                                          <div class="row g-2">
                                            <div class="col mb-0">
                                              <label for="useredit" class="form-label">Nama Pengguna</label>
                                              <input type="text" readonly id="useredit" class="form-control" value="<?= $data["nama_pengguna"] ?>" />
                                            </div>
                                          <div class="row g-2">
                                            <div class="col mb-0">
                                              <label for="alamatedit" class="form-label">Alamat</label>
                                              <input type="text" readonly id="alamatedit" class="form-control" value="<?= $data["alamat"] ?>" />
                                            </div>
                                            <div class="col mb-0">
                                              <label for="roleedit" class="form-label">Role</label>
                                              <input type="text" readonly id="roleedit" class="form-control" value="<?= $data["tingkat_akses"] ?>"  />
                                            </div>
                                          </div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                        
                        <!-- FORM DETAIL END -->

                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

                <!-- FORM TAMBAH -->
            <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">AKUN</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <form action="tambah.php" method="POST" enctype="multipart/form-data" id="tambah-form" >
                            <div class="modal-body">
                            <!-- <div class="row">
                                <div class="col mb-3">
                                  <label for="idLarge" class="form-label">No Admin</label>
                                  <input required type="text" id="idLarge" name="idLarge" class="form-control" value="<?php echo $new_id_admin; ?>" />
                                </div>
                              </div> -->
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="usernameLarge" class="form-label">Nama Pengguna</label>
                                  <input required type="text" id="usernameLarge" name="usernameLarge" class="form-control" placeholder="Masukkan Username" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="passwordLarge" class="form-label">Password</label>
                                  <input required type="text" id="passwordLarge" name="passwordLarge" class="form-control" placeholder="Masukkan Password" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="namaLarge" class="form-label">Nama Lengkap Pengguna</label>
                                  <input required type="text" id="namaLarge" name="namaLarge" class="form-control" placeholder="Masukkan Nama" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="alamatLarge" class="form-label">Alamat</label>
                                  <input required type="text" id="alamatLarge" name="alamatLarge" class="form-control" placeholder="Masukkan Alamat" />
                                </div>
                              </div>
                              <!-- <div class="row">
                                <div class="col mb-0">
                                  <label for="emailLarge" class="form-label">Email</label>
                                  <input required type="text" id="emailLarge" name="emailLarge" class="form-control" placeholder="xxxx@xxx.xx" />
                                </div>
                              </div> -->
                              <div class="row g-2">
                                <div class="mb-3 col mb-0">
                                    <label for="formFile" class="form-label">Default file input example</label>
                                  <input required class="form-control" type="file" id="formFile" name="formFile" accept="image/*"/>
                                </div>
                                <div class="mb-3 col mb-0">
                                  <label for="FormControlSelect1" class="form-label">Role</label>
                                  <select required class="form-select" id="FormControlSelect1" name="FormControlSelect1" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="admin">admin</option>
                                    <option value="pegawai">pegawai</option>
                                  </select>
                              </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button type="submit" class="btn btn-primary" name="btnsave" id="btnsave">Save changes</button>
                            </div>
                            </form>
                    </div>
                  </div>
            </div>
          
            <!-- FORM TAMBAH END -->



<!-- <Script>
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
</Script> -->


<!-- <script>
  const Toast = Swal.mixin({
  toast: true,
  position: "bottom-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Signed in successfully"
});
</script> -->


<!-- <script>
        const tambahForm = document.getElementById("tambah-form");
        tambahForm.addEventListener("submit", function (e) {
            e.preventDefault();

            // Menggunakan AJAX untuk mengirim data ke server
            const formData = new FormData(tambahForm);

            // Kirim data ke server untuk diproses
            fetch("tambah.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Data berhasil ditambahkan",
                    }).then(() => {
                        // Redirect atau tindakan lain setelah berhasil tambah data
                        window.location.href = "../akun/indexAkun.php";
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Gagal menambahkan data",
                        text: data.message
                    });
                }
            });
        });
</script> -->


<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

<?php 
    $content = ob_get_clean();
    include "../admin/body.php";

    
?>