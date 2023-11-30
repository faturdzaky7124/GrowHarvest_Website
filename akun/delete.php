<?php
    require_once "../function/koneksi.php";

    if(isset($_GET["id"])) {
        $id_produk = $_GET["id"];

        $queryshow = "SELECT * FROM tb_akun WHERE id_akun = '$id_produk'";
        $sqlshow = mysqli_query($con,$queryshow);
        $rowshow = mysqli_fetch_assoc($sqlshow);

        unlink("../assets/img/avatars/". $rowshow["gambar"]);

        $query ="DELETE FROM tb_akun WHERE id_akun ='$id_produk';";
        $sql = mysqli_query($con,$query);

        if ($sql) {
            echo "<script>window.location='../akun/indexAkun.php';</script>";
        } else {
            echo "<div class='alert alert-warning' role='alert'>Error inserting data into the database.</div>";
        }
    }
?>
