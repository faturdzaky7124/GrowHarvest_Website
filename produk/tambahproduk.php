<?php
    require "../function/koneksi.php";

    if( isset($_POST["btnsave"]) ) {

		if (tambahproduk ($_POST) > 0 ) {
			echo "<script>window.location='../produk/indexProduk.php';</script>";
		}else {
			echo "<script>window.location='../produk/indexProduk.php';</script>";
		}		
	}

?>
