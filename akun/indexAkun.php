<?php 
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

    // $query= " SELECT * FROM tb_akun ORDER BY id_akun ASC ";
    // $sql= mysqli_query($con,$query);
    // $no = 0;

      if ($_SESSION["tingkat_akses"] !== "admin") {
        header("location: ../admin/index.php"); 
      }

    $query = "SELECT * FROM tb_akun ORDER BY id_akun ASC";
    $sql = mysqli_query($con, $query);
    $no = 0;

?>
<style>
        .image-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 200px;
            overflow: hidden;
            border-radius: 10px;
            /* border: 2px solid #ccc; */
            margin-top: 10px;
        }
        .image-preview {
            max-width: 100%;
            max-height: 200px;
            /* margin-top: 10px; */
            border-radius: 8px;
        }


</style>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fitur /</span> Akun</h4>

                      <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-header fw-bold">Manajement Akun</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#largeModal"  name="btntambahakun" id="btntambahakun">Tambah Akun</button>
                </div>
                <!-- <div class="card-body"> -->
                  <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                    <caption class="ms-4">
                      List of Projects
                    </caption>
                      <thead>
                        <tr>
                          <th>No</th>
                          <!-- <th>Gambar</th> -->
                          <th>Nama</th>
                          <th>Nama Lengkap</th>
                          <th>Alamat</th>
                          <th>Peran</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($sql as $data): ?>
                        <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> <?php echo ++$no?> </strong>
                          </td>
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
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#largedetail<?= $data["id_akun"];?>" name="btndetailakun" id="btndetailakun"
                                  ><i class="bx bxs-detail me-1"></i> Details</a>
                                <a class="dropdown-item" href="edit.php?id_akun=<?= $data["id_akun"];?>"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a  class="dropdown-item " href = "delete.php?id=<?php echo $data['id_akun']; ?>"
                                  ><i class="bx bx-trash me-1"></i> Delete</a>
                              </div>
                            </div>
                          </td>
                        </tr>

                        <!-- FORM DETAIL -->
                        
                        <div class="modal fade" id="largedetail<?= $data["id_akun"];?>" tabindex="-1" aria-hidden="true">
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
                                              src="<?= $data["gambar"] ?>"
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
                                            <div class="col mb-0">
                                              <label for="useredit" class="form-label">No Hp</label>
                                              <input type="text" readonly id="useredit" class="form-control" value="<?= $data["no_hp"] ?>" />
                                            </div>
                                          <div class="row g-2">
                                            <div class="col mb-0">
                                              <label for="alamatedit" class="form-label">Alamat</label>
                                              <input type="text" readonly id="alamatedit" class="form-control" value="<?= $data["alamat"] ?>" />
                                            </div>
                                            <div class="col mb-0">
                                              <label for="roleedit" class="form-label">Peran</label>
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
                                <div class="col mb-3">
                                  <label for="nohptambah" class="form-label">NO HP</label>
                                  <input required type="number" id="nohptambah" name="nohptambah" class="form-control" placeholder="Masukkan No Hp" />
                                </div>
                              </div>
                              <div class="row g-2">
                                <div class="mb-3 col mb-0">
                                    <label for="formFile" class="form-label">Default file input example</label>
                                  <input required class="form-control" type="file" id="formFile" name="formFile" accept="image/*"/>
                                </div>
                                <div class="mb-3 col mb-0">
                                  <label for="FormControlSelect1" class="form-label">Peran</label>
                                  <select required class="form-select" id="FormControlSelect1" name="FormControlSelect1" aria-label="Default select example">
                                    <option value="admin">admin</option>
                                    <option value="pegawai">pegawai</option>
                                  </select>
                              </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="image-container">
                                    <img src="../assets/img/avatars/1.png" alt="Image Preview" id="imagePreview" class="image-preview">
                                  </div>
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


          
    <script>
        document.getElementById('formFile').addEventListener('change', function (event) {
            var input = event.target;
            var imagePreview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                imagePreview.src = '';
            }
        });
</script>


<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php 
    $content = ob_get_clean();
    include "../admin/body.php";

    
?>