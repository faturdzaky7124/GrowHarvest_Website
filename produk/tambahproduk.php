<?php
    require "../function/koneksi.php";

    if (isset($_POST["btnsave"])) {
        // Get the user input
        $namaproduk = $_POST["namaproduk"];
        $kategoriproduk = ($_POST["idkategoriproduk"]); // belum di enkripsi
        $stokproduk = $_POST["stokproduk"];
        $hargaproduk = $_POST["hargaproduk"];
        $deskripsiproduk = $_POST["deskripsiproduk"];

        // Full encryption
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if a file is uploaded
        if (isset($_FILES["gambarproduk"]) && $_FILES["gambarproduk"]["error"] == 0) {
            $dir = "../assets/img/imgproduk/";
            $gambar = $_FILES["gambarproduk"]["name"];
            $tmpFile = $_FILES["gambarproduk"]["tmp_name"];

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($tmpFile, $dir . $gambar)) {
                // Get the highest existing id_admin from the database
                $query = $con->query("SELECT MAX(id_produk) AS max_id FROM produk");
                $row = $query->fetch_assoc();
                $max_id = $row['max_id'];
                
                // Extract the numeric part and increment it
                $numeric_part = (int) substr($max_id, 2);
                $numeric_part++;
                $new_id_produk = 'PR' . str_pad($numeric_part, 3, '0', STR_PAD_LEFT);

                // Insert user data into the database
                $db = $con->query("INSERT INTO produk (id_produk, nama_produk, harga_produk, stok_produk, deskripsi, gambar_produk, id_kategori) 
                    VALUES ('$new_id_produk', '$namaproduk', '$hargaproduk', '$stokproduk', '$deskripsiproduk', '$gambar', '$kategoriproduk')");

                if ($db) {
                    echo "<script>window.location='../produk/indexProduk.php';</script>";
                } else {
                    echo "<div class='alert alert-warning' role='alert'>Error inserting data into the database.</div>";
                }
            } else {
                echo "<div class='alert alert-warning' role='alert'>Error uploading the file.</div>";
            }
        } else {
            echo "<div class='alert alert-warning' role='alert'>No file uploaded or an error occurred.</div>";
        }
    }

?>
