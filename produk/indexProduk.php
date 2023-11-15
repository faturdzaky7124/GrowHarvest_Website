<?php 
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

  $query= " SELECT * FROM produk ORDER BY id_produk ASC ";
  $sql= mysqli_query($con,$query);
  $no = 0;

  $query= " SELECT * FROM kategoriproduk ORDER BY id_kategori ASC ";
  $kate= mysqli_query($con,$query);
?>
<style>
        .image-container {
            display: flex;
            justify-content: center;
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

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fitur /</span> Produk</h4>

<!-- FORM TABEL PRODUK -->
<div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-header">Data Produk</h5>
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaltambahproduk"  name="btntambahproduk" id="btntambahproduk">Tambah Produk</button>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <caption class="ms-4">
                      List of Projects
                    </caption>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sql as $dataproduk): ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo ++$no?></strong></td>
                        <td><?php echo $dataproduk["nama_produk"]?></td>
                        <td><?php echo $dataproduk["harga_produk"]?></td>
                        <td><?php echo $dataproduk["stok_produk"]?></td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller"
                            >
                              <img src="../assets/img/imgproduk/<?php echo $dataproduk["gambar_produk"]?>" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="delete.php?id=<?php echo $dataproduk['id_produk']; ?>"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
<!-- FORM TABEL PRODUK END -->


              <!-- FORM TAMBAH PRODUK -->
              <div class="modal fade" id="modaltambahproduk" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">PRODUK</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <form action="tambahproduk.php" method="POST" enctype="multipart/form-data" id="tambah-form" >
                            <div class="modal-body">
                            <!-- <div class="row"> -->
                                <!-- <div class="col mb-3">
                                  <label for="idproduk" class="form-label">No Produk</label>
                                  <input required type="text" id="idproduk" name="idproduk" class="form-control" value="<?php echo $new_id_produk; ?>" />
                                </div>
                              </div> -->
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="namaproduk" class="form-label">Nama Produk</label>
                                  <input required type="text" id="namaproduk" name="namaproduk" class="form-control" placeholder="Masukkan Username" />
                                </div>
                              </div>
                              
                              <div class="mb-3 col mb-0">
                                  <label for="idkategoriproduk" class="form-label">Kategori</label>
                                  <select required class="form-select" id="idkategoriproduk" name="idkategoriproduk" aria-label="Default select example">
                                    <?php foreach ($kate as $datakategori): ?>
                                    <option value="<?= $datakategori["id_kategori"] ?>"><?= $datakategori["nama_kategori"] ?></option>
                                    <?php endforeach ?>
                                  </select>
                              </div>
                              
                              <div class="row g-2">
                                <div class="col mb-3">
                                  <label for="stokproduk" class="form-label">Stok</label>
                                  <input required type="number" id="stokproduk" name="stokproduk" class="form-control" placeholder="Masukkan stok  " />
                                </div>
                                <div class="col mb-3">
                                  <label for="hargaproduk" class="form-label">Harga</label>
                                  <input required type="number" id="hargaproduk" name="hargaproduk" class="form-control" placeholder="Masukkan Harga" />
                                </div>
                                </div>
                              <div class="row">
                                <div class="mb-3 col mb-0">
                                    <label for="gambarproduk" class="form-label">Default file input example</label>
                                  <input required class="form-control" type="file" id="gambarproduk" name="gambarproduk" accept="image/*"/>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="image-container">
                                    <img src="../assets/img/avatars/1.png" alt="Image Preview" id="imagePreview" class="image-preview">
                                  </div>
                                </div>
                              </div>
                              <div>
                                <label for="deskripsiproduk" class="form-label">Deskripsi Produk</label>
                                <textarea class="form-control" id="deskripsiproduk" name="deskripsiproduk" rows="3"></textarea>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-outline-secondary" name="btnkembali" id="btnkembali" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button type="submit" class="btn btn-primary" name="btnsave" id="btnsave">Save changes</button>
                            </div>
                            </form>
                      </div>
                    </div>
              </div>
              <!-- FORM TAMBAH PRODUK END -->

              <h5 class="pb-1 mb-4"></h5>
              <div class="row mb-5">
              <?php foreach ($sql as $dataproduk): ?>
                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img class="card-img card-img-left" height="200" width="200" src="../assets/img/imgproduk/<?php echo $dataproduk["gambar_produk"]?>" alt="Card image" />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $dataproduk["nama_produk"]?></h5>
                            <p class="card-text">
                              <?php echo $dataproduk["deskripsi"]?>
                            </p>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Rp <?php echo $dataproduk["harga_produk"]?></li>
                            </ul>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
                <!-- <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">
                            This is a wider card with supporting text below as a natural lead-in to additional content.
                            This content is a little bit longer.
                          </p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <img class="card-img card-img-right" src="../assets/img/elements/17.jpg" alt="Card image" />
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>




<script>
        document.getElementById('gambarproduk').addEventListener('change', function (event) {
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

<?php 
    $content = ob_get_clean();
    include "../admin/body.php";
?>