<?php
    require_once "../function/koneksi.php";

    if(isset($_GET["id"])) {
        $id_kategori = $_GET["id"];

        // Check if the category is associated with any products
        $check_query = "SELECT COUNT(*) as jumproduk FROM tb_produk WHERE id_kategori = '$id_kategori'";
        $check_result = mysqli_query($con, $check_query);
        $check_row = mysqli_fetch_assoc($check_result);

        if ($check_row['jumproduk'] > 0) {

            echo '<script type="text/javascript">';
            echo 'alert("Kategori masih terhubung dengan Produk");';
            echo 'window.location.href = "../kategori/indexKategori.php";';
            echo '</script>';

        } else {
            // If no associated products, proceed with deletion
            $queryshow = "SELECT * FROM tb_kategori WHERE id_kategori = '$id_kategori'";
            $sqlshow = mysqli_query($con, $queryshow);
            $rowshow = mysqli_fetch_assoc($sqlshow);

            $query ="DELETE FROM tb_kategori WHERE id_kategori ='$id_kategori';";
            $sql = mysqli_query($con, $query);

            if ($sql) {
                echo "<script>window.location='../kategori/indexKategori.php';</script>";
            } else {
                echo "<div class='alert alert-warning' role='alert'>Error inserting data into the database.</div>";
            }
        }
    }
?>