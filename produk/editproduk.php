<?php 
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

    if ($_SESSION["tingkat_akses"] !== "admin") {
        header("location: ../admin/index.php"); 
	}

	$produk= $_GET["id_produk"];
	$swa = query("SELECT * FROM tb_produk WHERE id_produk = '$produk'")[0];

  if( isset($_POST["simpanubahakun"]) ) {

		if (ubahproduk ($_POST) > 0 ) {
			echo "<script>window.location='../produk/indexProduk.php';</script>";
		}else {
			echo "<script>window.location='../produk/indexProduk.php';</script>";
		}		
	}
?>

          <!-- FROM EDIT -->
						<div class="card mb-4">
						<h3 class="card-header">Edit User</h3>
						<hr class="my-0" />
						<!-- Account -->
						<div class="card-body">
						<form id="updateakun" action="" method="POST" onsubmit="return confirmEdit(event)" enctype="multipart/form-data">
						<div class="d-flex align-items-start align-items-sm-center mb-4 gap-4">
							<img
							src="<?= $swa["gambar_produk"] ?>"
							alt="user-avatar"
							class="d-block w-px-100 h-px-100 rounded"
							name="uploadedAvatar"
							id="uploadedAvatar" />
              <div class="button-wrapper">
                          <label for="uploadubahgambar" class="btn btn-success me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="uploadubahgambar"
                              name="uploadubahgambar"
                              class="account-file-input"
                              hidden
                              accept="image/*"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
						</div>
							<div class="row">
              <hr class="my-0" />
							<div class="mb-3 col-md-6">
								<label for="idadmin" class="form-label">ID</label>
								<input
								class="form-control"
								type="text"
                id="idadmin"
								name="idadmin"
								value="<?= $swa["id_produk"] ?>" readonly
								placeholder="" required
								autofocus />
							</div>
							<div class="mb-3 col-md-6">
								<label for="ubahnama" class="form-label">Nama Produk</label>
								<input class="form-control" id="ubahnama" type="text" name="ubahnama" value="<?= $swa["nama_produk"] ?>" required />
								<span id="error-message" style="color: #00B300;"></span>
							</div>
							<div class="mb-3 col-md-6">
								<label for="ubahharga" class="form-label">Harga</label>
								<input type="text" class="form-control" id="ubahharga" value="<?= $swa["harga_produk"] ?>" required name="ubahharga" />
							</div>
							<div class="mb-3 col-md-6">
								<label for="state" class="form-label">Stok</label>
								<input class="form-control" type="text" value="<?= $swa["stok_produk"] ?>" required name="ubahstok" id="ubahstok" placeholder="" />
							</div>
              <!-- <div class="mb-3 col-md-6">
								<label for="state" class="form-label">Kategori</label>
								<input class="form-control" type="text" value="<?= $swa["id_kategori"] ?>" readonly required name="level" placeholder="" />
							</div> -->
              <div class="mb-3 col mb-0">
                                  <label for="ubahkategoriproduk" class="form-label">Kategori</label>
                                  <input class="form-control" type="text" value="<?= $swa["id_kategori"] ?>" readonly required id="ubahkategoriproduk" name="ubahkategoriproduk" placeholder="" />
                </select>
              </div>
              <div>
                <label for="deskripsiproduk" class="form-label">Deskripsi Produk</label>
                <textarea class="form-control" id="deskripsiproduk" name="deskripsiproduk" rows="3"></textarea>
              </div>
							</div>

							<div class="mt-4">
							<button type="submit"  id="simpanubahakun" name="simpanubahakun" class="btn btn-success me-2">Simpan Data</button>
							<a class="btn btn-outline-secondary" href="indexProduk.php">Kembali</a>
							</div>
							</form>
						</div>
						<!-- /Account -->
					</div>
          <!-- FORM EDIT END -->


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

<!-- <script>
function confirmEdit(event) {
  event.preventDefault();

  Swal.fire({
    title: 'Apakah Ingin Mengubah Data?',
    // text: 'Apakah Anda yakin ingin menyimpan perubahan?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Ya',
    cancelButtonText: 'Batal',
    customClass: {
      confirmButton: 'btn btn-primary me-2',
      cancelButton: 'btn btn-label-secondary'
    },
    buttonsStyling: false
  }).then((result) => {
    if (result.isConfirmed) {
      // Get user data from form
      const formData = new FormData(document.getElementById('formAccountSettings'));

      // Send user data to the server-side script
      fetch('action.php', {
        method: 'POST',
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Swal.fire('Data Tersimpan', '', 'success');

            Swal.fire({
  icon: 'success',
  title: 'Data Tersimpan',
  showConfirmButton: false,
  timer: 1500
})

            setTimeout(() => {
              window.location.href = 'datauser.php';
            }, 1500);
          } else {
            Swal.fire('Kesalahan', data.message, 'error');
          }
        })
        .catch(error => {
          console.error('Terjadi kesalahan:', error);
          Swal.fire('Kesalahan', 'Terjadi kesalahan saat menyimpan data.', 'error');
        });
    }
  });
}
</script> -->



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

<?php 
    $content = ob_get_clean();
    include "../admin/body.php";

    
?>