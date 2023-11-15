<?php
    require_once "../function/koneksi.php";

    if(isset($_GET["id"])) {
        $id_kategori = $_GET["id"];

        $queryshow = "SELECT * FROM kategoriproduk WHERE id_kategori = '$id_kategori'";
        $sqlshow = mysqli_query($con,$queryshow);
        $rowshow = mysqli_fetch_assoc($sqlshow);

        $query ="DELETE FROM kategoriproduk WHERE id_kategori ='$id_kategori';";
        $sql = mysqli_query($con,$query);

        if ($sql) {
            echo "<script>window.location='../kategori/indexKategori.php';</script>";
        } else {
            echo "<div class='alert alert-warning' role='alert'>Error inserting data into the database.</div>";
        }
    }
?>