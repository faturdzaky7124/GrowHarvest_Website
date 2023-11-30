<?php
    $con=mysqli_connect("localhost","root","","growharvest");

	function query($query){
		global $con;
		$result = mysqli_query($con, $query);
		$tempat=[];

		while ($row=mysqli_fetch_assoc($result)) {
			$tempat[]=$row;
		}
		return $tempat;
	}


	//*** CRUD KATEGORI ***//

    function ubahkategori($data){
		global $con;

		$id = $data["id_kategori"];

		$nama = htmlspecialchars($data["namaedit"]);
        // $pengguna = htmlspecialchars($data["useredit"]);
        // $password = htmlspecialchars($data["passwordedit"]);
		// $alamat = htmlspecialchars($data["alamatedit"]);
        // $upload = htmlspecialchars($data["upload"]);

		
		$query = "UPDATE `tb_kategori` SET
		`nama_kategori` = '$nama' 
		WHERE `tb_kategori`.`id_kategori` = '$id'";

		mysqli_query($con, $query);

		return mysqli_affected_rows($con);
	}


	function tambahkategori($data){
		date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu sesuai kebutuhan Anda

		global $con;
	
		// Membuat id otomatis dengan format KT001
		$queryId = "SELECT MAX(id_kategori) AS max_id FROM tb_kategori";
		$result = mysqli_query($con, $queryId);
		$row = mysqli_fetch_assoc($result);
		$maxId = $row['max_id'];
	
		// Mengambil angka dari id terakhir dan menambahkannya dengan 1
		$idNumber = (int)substr($maxId, 2);
		$idNumber++;
		$newId = 'KT' . str_pad($idNumber, 3, '0', STR_PAD_LEFT);
	
		$nama = htmlspecialchars($data["kategoritambah"]);
		
		// Menghasilkan tanggal saat ini
		$tanggal = date("Y-m-d H:i:s");
	
		$query = "INSERT INTO tb_kategori (id_kategori, nama_kategori, tanggal_kategori)
					VALUES ('$newId', '$nama', '$tanggal')";
	
		mysqli_query($con, $query);
	
		return mysqli_affected_rows($con);
	}
	


	//*** CRUD AKUN ***//

	function tambahakun($data){
		global $con;
		$username = htmlspecialchars($data["usernameLarge"]);
		$password = htmlspecialchars($data["passwordLarge"]); // belum di enkripsi
		$nama = htmlspecialchars($data["namaLarge"]);
		$alamat = htmlspecialchars($data["alamatLarge"]);
		$akses = htmlspecialchars($data["FormControlSelect1"]);
		$nohp= htmlspecialchars($data["nohptambah"]);
	
		// Full encryption
		$hashed_password = password_hash($password, PASSWORD_BCRYPT);
	
		// Check if a file is uploaded
		if (isset($_FILES["formFile"]) && $_FILES["formFile"]["error"] == 0) {
			$dir = "../assets/img/avatars/";
			$gambar = $_FILES["formFile"]["name"];
			$tmpFile = $_FILES["formFile"]["tmp_name"];
	
			// Move the uploaded file to the desired directory
			if (move_uploaded_file($tmpFile, $dir . $gambar)) {
				// Generate a unique ID for the user
				$id_akun = generateUniqueUserID();
	
				// Build the URL for the avatar image
				$avatar_url = "https://growharvest.my.id/assets/img/avatars/" . $gambar;
	
				// Insert user data into the database
				$db = $con->query("INSERT INTO tb_akun (id_akun, nama_pengguna, kata_sandi, nama_lengkap, alamat, gambar,tingkat_akses, no_hp) 
					VALUES ('$id_akun', '$username', '$hashed_password', '$nama', '$alamat', '$avatar_url', '$akses', '$nohp')");
			}
		}
	}
	
	function generateUniqueUserID() {
		// Retrieve the highest existing id_akun from the database
		global $con;
		$query = $con->query("SELECT MAX(id_akun) AS max_id FROM tb_akun");
		$row = $query->fetch_assoc();
		$max_id = $row['max_id'];
	
		// Extract the numeric part and increment it
		$numeric_part = (int) substr($max_id, 2);
		$numeric_part++;
		$new_id_akun = 'US' . str_pad($numeric_part, 3, '0', STR_PAD_LEFT);
	
		return $new_id_akun;
	}
	

	function ubahakun($data){
		global $con;
		$id_admin = $data["idadmin"];
		$username = $data["ubahusername"];
		$nama = $data["ubahnama"];
		$alamat = $data["ubahalamat"];
		$nohpku = $data["ubahnohp"];
		$gambar_produk = $_FILES['uploadubahgambar']['name'];
	
		if ($gambar_produk != "") {
			$ekstensi_diperbolehkan = array('png', 'jpg'); // Ekstensi file gambar yang bisa diupload 
			$x = explode('.', $gambar_produk); // Memisahkan nama file dengan ekstensi yang diupload
			$ekstensi = strtolower(end($x));
			$file_tmp = $_FILES['uploadubahgambar']['tmp_name'];
	
			$nama_gambar_baru = $gambar_produk; 
	
			if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
				move_uploaded_file($file_tmp, '../assets/img/avatars/' . $nama_gambar_baru); 
				// Delete old image if it exists
				$query_select = "SELECT gambar FROM tb_akun WHERE id_akun = '$id_admin'";
				$result_select = mysqli_query($con, $query_select);
	
				if ($row_select = mysqli_fetch_assoc($result_select)) {
					$gambar_lama = $row_select['gambar'];
					if ($gambar_lama != 'default.jpg') { // Assuming default image is 'default.jpg', change it if needed
						$path_gambar_lama = 'https://growharvest.my.id/assets/img/avatars/' . $gambar_lama;
						if (file_exists($path_gambar_lama)) {
							unlink($path_gambar_lama);
						}
					}
				}
	
				// Update user data in the database with the new image link
				$gambar_url_baru = "https://growharvest.my.id/assets/img/avatars/" . $nama_gambar_baru;
				$query = "UPDATE tb_akun SET id_akun = '$id_admin', nama_pengguna = '$username', nama_lengkap = '$nama', alamat = '$alamat', gambar = '$gambar_url_baru', no_hp = '$nohpku'";
				$query .= " WHERE tb_akun.id_akun = '$id_admin'";
				$result = mysqli_query($con, $query);
	
				if (!$result) {
					die ("Query gagal dijalankan: " . mysqli_errno($con) . " - " . mysqli_error($con));
				}
			}
		} else {
			// Update user data in the database without changing the image link
			$query = "UPDATE tb_akun SET id_akun = '$id_admin', nama_pengguna = '$username', nama_lengkap = '$nama', alamat = '$alamat', no_hp = '$nohpku'";
			$query .= " WHERE tb_akun.id_akun = '$id_admin'";
			$result = mysqli_query($con, $query);
	
			// Periska query apakah ada error
			if (!$result) {
				die ("Query gagal dijalankan: " . mysqli_errno($con) . " - " . mysqli_error($con));
			}
		}
	}
	
	// function hapusakun($delete) {
	// 	global $con;
	
	// 	// Mengambil path file gambar dari database berdasarkan id_akun
	// 	$queryshow = "SELECT * FROM tb_akun WHERE id_akun = '$delete'";
    //     $sqlshow = mysqli_query($con,$queryshow);
    //     $rowshow = mysqli_fetch_assoc($sqlshow);

    //     unlink("../assets/img/avatars/". $rowshow["gambar"]);

    //     $query ="DELETE FROM tb_akun WHERE id_akun ='$delete';";
    //     $sql = mysqli_query($con,$query);
	
	// 	return mysqli_affected_rows($con);
	// }
	


	//*** CRUD PRODUK ***//

	function tambahproduk($data) {
		global $con;
		$namaproduk = $_POST["namaproduk"];
		$kategoriproduk = ($_POST["idkategoriproduk"]); // belum di enkripsi
		$stokproduk = $_POST["stokproduk"];
		$hargaproduk = $_POST["hargaproduk"];
		$deskripsiproduk = $_POST["deskripsiproduk"];
	
		// Check if a file is uploaded
		if (isset($_FILES["gambarproduk"]) && $_FILES["gambarproduk"]["error"] == 0) {
			$dir = "../assets/img/imgproduk/";
			$gambar = $_FILES["gambarproduk"]["name"];
			$tmpFile = $_FILES["gambarproduk"]["tmp_name"];
	
			// Move the uploaded file to the desired directory
			if (move_uploaded_file($tmpFile, $dir . $gambar)) {
				// Generate a unique ID for the product
				$new_id_produk = generateUniqueProductID();
	
				// Build the URL for the image
				$image_url = "https://growharvest.my.id/assets/img/imgproduk/" . $gambar;
	
				// Insert user data into the database
				$db = $con->query("INSERT INTO tb_produk (id_produk, nama_produk, harga_produk, stok_produk, deskripsi, gambar_produk, id_kategori) 
					VALUES ('$new_id_produk', '$namaproduk', '$hargaproduk', '$stokproduk', '$deskripsiproduk', '$image_url', '$kategoriproduk')");
			}
		}
	}
	
	function generateUniqueProductID() {
		// Retrieve the highest existing id_produk from the database
		global $con;
		$query = $con->query("SELECT MAX(id_produk) AS max_id FROM tb_produk");
		$row = $query->fetch_assoc();
		$max_id = $row['max_id'];
	
		// Extract the numeric part and increment it
		$numeric_part = (int) substr($max_id, 2);
		$numeric_part++;
		$new_id_produk = 'PR' . str_pad($numeric_part, 3, '0', STR_PAD_LEFT);
	
		return $new_id_produk;
	}

	function ubahproduk($data){
		global $con;
		$id_admin = $data["idadmin"];
		$nama = $data["ubahnama"];
		$kategori = $data["ubahkategoriproduk"];
		$stok = $data["ubahstok"];
		$harga = $data["ubahharga"];
		$deskripsiproduk = $data["deskripsiproduk"]; 
		$gambar_produk = $_FILES['uploadubahgambar']['name'];

		if($gambar_produk != "") {
			$ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
			$x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
			$ekstensi = strtolower(end($x));
			$file_tmp = $_FILES['uploadubahgambar']['tmp_name'];   
			// $angka_acak     = rand(1,999);
			$nama_gambar_baru = $gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
						move_uploaded_file($file_tmp, '../assets/img/imgproduk/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
							

						if ($gambar_lama = 'gambar_produk') {
							$path_gambar_lama = 'https://growharvest.my.id/assets/img/imgproduk/' . $gambar_lama;
							if (file_exists($path_gambar_lama)) {
								unlink($path_gambar_lama);
							}
						}

						$gambar_url_baru = "https://growharvest.my.id/assets/img/imgproduk/" . $nama_gambar_baru;
						$query  = "UPDATE tb_produk SET id_produk = '$id_admin', nama_produk = '$nama', id_kategori = '$kategori', stok_produk = '$stok', harga_produk = '$harga', deskripsi = '$deskripsiproduk', gambar_produk = '$gambar_url_baru'";
							$query .= "WHERE tb_produk.id_produk = '$id_admin'";
							$result = mysqli_query($con, $query);

							if(!$result){
								die ("Query gagal dijalankan: ".mysqli_errno($con).
									" - ".mysqli_error($con));
							} else {
							}
					} else {     
					}
			} else {

				$query  = "UPDATE tb_produk SET id_produk = '$id_admin', nama_produk = '$nama', id_kategori = '$kategori', stok_produk = '$stok', harga_produk = '$harga', deskripsi = '$deskripsiproduk'";
				$query .= "WHERE tb_produk.id_produk = '$id_admin'";
			$result = mysqli_query($con, $query);
			// periska query apakah ada error
			if(!$result){
					die ("Query gagal dijalankan: ".mysqli_errno($con).
									" - ".mysqli_error($con));
			} else {
			}
			}
}
	
?>